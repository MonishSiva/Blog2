<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubBlog extends Model
{
    use HasFactory;

     protected $fillable = ['main_blog_id', 'heading', 'image', 'description'];

    public function mainBlog()
    {
        return $this->belongsTo(MainBlog::class);
    }
}
