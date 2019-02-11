<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title', 'category_id', 'content', 'click_count', 'is_show',
    ];

    protected $casts = [
        'is_show' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
