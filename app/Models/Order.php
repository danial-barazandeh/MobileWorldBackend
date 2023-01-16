<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'vendor_id',
        'product_id',
        'price_at_time',
        'sale_price_at_time',
        'status'
    ];


    public function vendor()
    {
        return $this->hasOne(Vendor::class,'id','vendor_id');
    }
    public function user()
    {
        return $this->hasOne(Vendor::class,'id','user_id');
    }
    public function product()
    {
        return $this->hasOne(Vendor::class,'id','product_id');
    }
}
