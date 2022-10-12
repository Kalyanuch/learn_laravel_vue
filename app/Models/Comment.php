<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * Fields that allowed for autofill (not required).
     *
     * @var string[]
     */
    protected $fillable = ['subject', 'body', 'article_id'];

    /**
     * Fields that not allowed for autofill (not required).
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Returns comment article (OneToOne relation).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function article()
    {
        $this->belongsTo(Article::class);
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
}
