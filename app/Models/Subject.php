<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = ['subject'];
    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class, 'article_subject', 'subject_id', 'article_id');
    }
}
