<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'slider';

    protected $fillable = [
        'type',
        'image'
    ];

}
