<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Product;

class Vendor extends Model
{
    use HasFactory;
    protected $table = 'vendor';
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
