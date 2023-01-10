<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brand';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'image',
    ];

    public function devices()
    {
        return $this->hasMany(Device::class);
    }

}
