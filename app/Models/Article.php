<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
    protected $fillable = ['title','image_url','content','tags','slug'];
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, "articles_categories");
    }
}
