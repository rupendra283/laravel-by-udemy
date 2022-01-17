<?php

namespace App\Models;

use App\Scope\LatestScope;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get the user that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    /**
     * Get all of the comments for the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id')->latest();
    }

//this is global query scope
    // public static function boot(){

    //     parent::boot();
    //     static::addGlobalScope(new LatestScope);
    // }

//local scope
    public function scopeLatest(Builder $query){

        return $query->orderBy(static::CREATED_AT,'desc');
    }

    //most commented blog post

    public function scopeMostCommented(Builder $query)
    {
        // comments_count
        return $query->withCount('comments')->orderBy('comments_count', 'desc');
    }

}
