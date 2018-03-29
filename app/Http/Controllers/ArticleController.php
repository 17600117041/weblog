<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Repositories\ArticleRepository;
use App\Repositories\TagRepository;

class ArticleController extends Controller
{
    protected $article;

    protected $tag;

    public function __construct(ArticleRepository $article, TagRepository $tag)
    {
        $this->article = $article;
        $this->tag = $tag;
    }

    /**
     * Display the articles resource.
     *
     * @return mixed
     */
    public function index()
    {
        $articles = $this->article->page(config('blog.article.number'), config('blog.article.sort'), config('blog.article.sortColumn'));
        $tags = $this->tag->all();
        return view('article.index', compact('articles'), compact('tags'));
    }

    /**
     * Display the article resource by article slug.
     *
     * @param  string $slug
     * @return mixed
     */
    public function show($slug)
    {
        $article = $this->article->getBySlug($slug);

        return view('article.show', compact('article'));
    }
}
