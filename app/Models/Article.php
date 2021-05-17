<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function setCategoryAttribute($value)
    {
        $this->attributes['article_categories'] = json_encode($value);
    }

    public function getCategoryAttribute($value)
    {
       return $this->attributes['article_categories'] = json_decode($value);
    }

    public function article_category()
    {
        return $this->hasMany(ArticleCategory::class);
    }
}
