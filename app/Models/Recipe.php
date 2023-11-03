<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "title", "slug", "description", "cooking_time", "difficulty_level", "cooking_method", "serving_size", "tags", "image_url"
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, "recipes_categories");
    }

    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class, "recipes_ingredients");
    }
}
