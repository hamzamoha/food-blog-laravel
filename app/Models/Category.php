<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "label", "slug", "description", "image_url"
    ];

    public function recipes(): HasMany
    {
        return $this->hasMany(Recipe::class);
    }
}