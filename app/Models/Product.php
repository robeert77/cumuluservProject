<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory, Searchable;

    public function searchableAs()
    {
        return 'products';
    }

    public function toSearchableArray()
    {
        $array = $this->only('name', 'serial_number', 'part_number', 'day', 'price');
        return $array;
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
