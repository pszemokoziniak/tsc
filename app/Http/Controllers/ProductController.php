<?php

namespace App\Http\Controllers;

use App\Imports\ProductsImport;
use App\Models\Product;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return Inertia::render('Products/Index', [
            'filters' => Request::all('search'),
            'products' => Product::filter(Request::only('search'))->get(),
        ]);
    }

    public function import()
    {
        return Inertia::render('Products/Store');
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx'
        ]);

        Excel::import(new ProductsImport, $request->file('file'));

        return Redirect::back()->with('success', 'Produkty zaimportowano pomyślnie.');
    }
}
