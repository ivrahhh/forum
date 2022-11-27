<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'content',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function comments() : HasMany
    {
        return $this->hasMany(Comment::class,'post_id');
    }

    public function tags() : BelongsToMany
    {
        return $this->belongsToMany(Tags::class,'post_tags', 'post_id','tag_id');
    }

    public function likes() : BelongsToMany
    {
        return $this->belongsToMany(User::class,'user_likes','post_id','user_id')->withTimestamps();
    }
}
