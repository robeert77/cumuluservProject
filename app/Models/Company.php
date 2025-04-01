<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'vat', 'type', 'status', 'address', 'phone', 'email', 'details'
    ];

    public function interventions()
    {
        return $this->hasMany(Intervention::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
