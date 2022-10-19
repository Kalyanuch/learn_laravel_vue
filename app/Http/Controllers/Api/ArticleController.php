<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use App\Services\ArticleService;
use Illuminate\Http\Request;

/**
 * Implements additional article functionality.
 */
class ArticleController extends Controller
{
    /**
     * Article service.
     *
     * @var ArticleService
     */
    protected $articleService;

    /**
     * Class constructor.
     *
     * @param ArticleService $articleService
     *   Article service.
     */
    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    /**
     * Show article data.
     *
     * @param Request $request
     *   Request service.
     * @return ArticleResource
     *   Article response for json API.
     */
    public function show(Request $request)
    {
        $article = $this->articleService->getArticleBySlug($request);

        return new ArticleResource($article);
    }

    /**
     * Implements article views counter.
     *
     * @param Request $request
     *   Request service.
     *
     * @return ArticleResource
     *   Article response for json API.
     */
    public function viewsIncrement(Request $request)
    {
        $article = $this->articleService->getArticleBySlug($request);
        $article->state->increment('views');

        return new ArticleResource($article);
    }

    /**
     * implements article likes counter.
     *
     * @param Request $request
     *   Request service.
     *
     * @return ArticleResource
     *   Article response for json API.
     */
    public function likesIncrement(Request $request)
    {
        $article = $this->articleService->getArticleBySlug($request);

        $inc = $request->get('increment');
        $inc ? $article->state->increment('likes') : $article->state->decrement('likes');

        return new ArticleResource($article);
    }
}
