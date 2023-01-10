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
        'brand_id',
        'device_id',
        'part_category_id',
        'vendor_id'
    ];


    public function vendor()
    {
        return $this->hasOne(Vendor::class,'id','vendor_id');
    }
}
