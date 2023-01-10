<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillable = [
        'title',
        'content',
        'image'
    ];

    public function author()
    {
        return $this->hasOne(User::class);
    }
}
