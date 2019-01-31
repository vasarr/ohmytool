<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    protected $fillable = [
      'title', 'url', 'icon', 'description', 'click_count'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
