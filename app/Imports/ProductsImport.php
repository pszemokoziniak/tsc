<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Product::create([
                'nazwa_produktu' => $row['nazwa_produktu'],
                'producent' => $row['producent'],
                'jednostka_ceny' => $row['jednostka_ceny'],
                'waga' => $row['waga'],
                'srednica' => $row['srednica'],
                'dlugosc' => $row['dlugosc'],
                'szerokosc' => $row['szerokosc'],
                'wysokosc' => $row['wysokosc'],
                'grubosc' => $row['grubosc'],
                'typ_pakowania' => $row['typ_pakowania'],
                'jednostki_zakupu' => $row['jednostki_zakupu'] . ' ' . $row[14],
            ]);
        }
    }
}
