<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    /**
     * Fields that allowed for autofill (not required).
     *
     * @var string[]
     */
    protected $fillable = ['title', 'body', 'img', 'slug'];

    /**
     * Date fields list (not created_at and updated_at).
     *
     * @var string[]
     */
    public $dates = ['published_at'];

    /**
     * Fields that not allowed for autofill (not required).
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Returns article comments (OneToMany relation).
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Returns article statistics (OneToOne relation).
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function state()
    {
        return $this->hasOne(State::class);
    }

    /**
     * Returns article tags (ManyToMany relation).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Prepares body previes string.
     *
     * @return string
     */
    public function getBodyPreview()
    {
//        return Str::limit($this->body, 100); it doesn't works.
        return Str::substr($this->body, 0, 100) . ' ...';
    }

    /**
     * Prepares article age in humans readable format.
     *
     * @return mixed
     */
    public function createdAtForHumans()
    {
        return $this->created_at->diffForHumans();
    }

    /**
     * Prepares article published interval in humans readable format.
     *
     * @return mixed
     */
    public function publishedAtForHumans()
    {
        return $this->published_at->diffForHumans();
    }

    /**
     * Scope model function to get limited value of articles.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *   Query builder.
     * @param int $limit
     *   Articles limit.
     *
     * @return mixed
     */
    public function scopeLastLimit(Builder $query, int $limit = 5)
    {
        return $query->with('state', 'tags')
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }
}
