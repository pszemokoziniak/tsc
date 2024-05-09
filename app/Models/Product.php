<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nazwa_produktu',
        'producent',
        'jednostka_ceny',
        'waga',
        'srednica',
        'dlugosc',
        'szerokosc',
        'wysokosc',
        'grubosc',
        'typ_pakowania',
        'jednostki_zakupu'
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('nazwa_produktu', 'like', '%' . $search . '%')
                    ->orWhere('producent', 'like', '%' . $search . '%');
            });
        });
    }
}
