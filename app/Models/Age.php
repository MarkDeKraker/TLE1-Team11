<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Age extends Model
{
    use HasFactory;

    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class, 'article_age', 'age_id', 'article_id');
    }
}
