<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    protected $fillable = [
      'title', 'category_id', 'url', 'icon', 'description', 'click_count', 'is_show',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
