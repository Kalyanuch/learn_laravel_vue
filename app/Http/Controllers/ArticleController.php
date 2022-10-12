<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Implements article list page.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *   Return page.
     */
    public function index()
    {
        $articles = Article::allPaginate(10);

        return view('app.article.index', compact('articles'));
    }

    /**
     * Implements article page.
     *
     * @param string $slug
     *   Article slug.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *   Return page.
     */
    public function show(string $slug)
    {
        $article = Article::findBySlug($slug);

        $tags = $article->tags();

        return view('app.article.show', compact('article'));
    }

    /**
     * Implements article list by tag page.
     *
     * @param string $tag
     *   Tag label.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *   Return page.
     */
    public function allByTag(Tag $tag)
    {
//        $articles = $tag->articles()->findByTag();
        $articles = $tag->articles() ?? [];

        return view('app.article.byTag', compact('articles'));
    }
}
