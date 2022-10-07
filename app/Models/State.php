<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    /**
     * Fields that allowed for autofill (not required).
     *
     * @var string[]
     */
    protected $fillable = ['likes', 'views', 'article_id'];

    /**
     * Fields that not allowed for autofill (not required).
     *
     * @var array
     */
    protected $guarded = [];
}
