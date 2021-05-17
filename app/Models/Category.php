<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->hasMany(Category::class);
    }

    public function article()
    {
        return $this->hasMany(Article::class);
    }

}