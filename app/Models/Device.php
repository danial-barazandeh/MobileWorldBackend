<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'device';
    protected $fillable = [
        'name',
        'image',
        'models',
        'brand_id'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
