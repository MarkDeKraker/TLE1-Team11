<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'image', 'user_id'];

    public function ages(): BelongsToMany {
        return $this->belongsToMany(Age::class, 'article_age', 'article_id', 'age_id');
    }
    public function subjects(): BelongsToMany {
        return $this->belongsToMany(Subject::class, 'article_subject', 'article_id', 'subject_id');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
