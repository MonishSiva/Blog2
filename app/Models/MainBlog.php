<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainBlog extends Model
{
    use HasFactory;

     protected $fillable = ['title'];

    public function subBlogs()
    {
        return $this->hasMany(SubBlog::class);
    }
}
