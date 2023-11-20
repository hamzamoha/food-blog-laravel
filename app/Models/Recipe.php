<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Recipe extends Model
{
    use SoftDeletes;
    protected $fillable = [
        "title", "slug", "description", "cooking_time", "difficulty_level", "cooking_method", "serving_size", "tags", "image_url"
    ];
    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Str::title($value),
        );
    }
    protected function tags(): Attribute
    {
        return Attribute::make(
            get: function (string $value) {
                $t = [];
                $e = explode(",", $value);
                foreach ($e as $s) {
                    $t[strtolower($s)] = Str::title($s);
                }
                return $t;
            },
        );
    }
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, "recipes_categories");
    }
    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class, "recipes_ingredients");
    }
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    public function relatedRecipes($limit = 6)
    {
        // Get current recipe's ID
        $currentRecipeId = $this->id;

        // Get all recipes except the current one
        $recipes = self::where('id', '!=', $currentRecipeId)->get();

        // Get current recipe's categories and tags
        $currentCategories = $this->categories()->pluck('categories.id');
        $currentTags = $this->tags;

        // Loop through each recipe and calculate common categories and tags count
        $recipesWithCounts = $recipes->map(function ($recipe) use ($currentCategories, $currentTags) {
            $relatedCategories = $recipe->categories()->pluck('categories.id');
            $relatedTags = $recipe->tags;

            $commonCategoriesCount = count(array_intersect($currentCategories->toArray(), $relatedCategories->toArray()));
            $commonTagsCount = count(array_intersect($currentTags, $relatedTags));

            $recipe->count_common_categories = $commonCategoriesCount;
            $recipe->count_common_tags = $commonTagsCount;

            return $recipe;
        });

        $sortedRecipes = $recipesWithCounts
            ->sortByDesc('count_common_categories')
            ->sortByDesc('count_common_tags')
            ->take($limit);

        return $sortedRecipes;
    }
}
