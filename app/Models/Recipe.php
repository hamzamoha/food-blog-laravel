<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "title", "slug", "description", "cooking_time", "difficulty_level", "cooking_method", "serving_size", "category_id", "tags", "image_url"
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
