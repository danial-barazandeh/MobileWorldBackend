<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'product';
    protected $fillable = [
        'name',
        'content',
        'image',
        'price',
        'sale_price',
        'owner_id',
        'brand_id',
        'device_id',
        'part_category_id'
    ];

    public function user()
    {
        return $this->hasOne(User::class,'id','owner_id');
    }
}
