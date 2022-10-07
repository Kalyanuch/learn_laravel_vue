<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    /**
     * Fields that allowed for autofill (not required).
     *
     * @var string[]
     */
    protected $fillable = ['label'];

    /**
     * Fields that not allowed for autofill (not required).
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Returns tag articles (OneToMany relation).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function articles()
    {
        $this->belongsToMany(Article::class);
    }
}
