<?php

namespace App\Services;

use App\Models\Article;
use Symfony\Component\HttpFoundation\Request;

/**
 * Implements article service.
 */
class ArticleService {

    /**
     * Find article by slug.
     *
     * @param Request $request
     *   Request service.
     *
     * @return mixed
     *   Article model.
     */
    public function getArticleBySlug(Request $request)
    {
        $slug = $request->get('slug') ?? '';

        return Article::findBySlug($slug);
    }
}
