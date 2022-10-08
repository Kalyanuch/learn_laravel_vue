<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
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

    public function getBodyPreview()
    {
//        return Str::limit($this->body, 100); it doesn't works.
        return Str::substr($this->body, 0, 100) . ' ...';
    }

    public function createdAtForHumans()
    {
        return $this->created_at->diffForHumans();
    }
}
