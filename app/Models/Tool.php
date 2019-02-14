<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    protected $fillable = [
      'title', 'category_id', 'url', 'icon', 'description', 'click_count', 'is_show',
    ];

    protected $casts = [
        'is_show' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getImageUrlAttribute()
    {
        // 如果 image 字段本身就已经是完整的 url 就直接返回
        if (Str::startsWith($this->attributes['image'], ['http://', 'https://'])) {
            return $this->attributes['icon'];
        }
        return \Storage::disk('admin')->url($this->attributes['icon']);
    }
}
