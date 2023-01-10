<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Firebase extends Model
{
    use HasFactory;
    protected $table = 'table_firebase_auth';
    public $timestamps = true;
    protected $fillable = [
        'phone',
        'token',
    ];
}
