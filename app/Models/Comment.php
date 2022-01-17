<?php

namespace App\Models;

use App\Scope\LatestScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

    /**
     * Get the user that owns the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
        // This is global query scope
    // public static function boot(){

    //     parent::boot();
    //     static::addGlobalScope(new LatestScope);
    // }
    //local query scope
    public function scopeLatest(Builder $query){

        return $query->orderBy(static::CREATED_AT,'desc');
    }
}
