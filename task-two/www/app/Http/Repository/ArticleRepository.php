<?php

namespace App\Http\Repository;


use App\Library\Providers\SearchProvider\Factories\SearchFactory;
use App\Library\Traits\IceAndFireTrait;
use App\Models\Article;

class ArticleRepository
{

    private $article;

    /**
     * ArticleRepository constructor.
     * @param Article $article
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }


    /**
     * functions to get all articles
     *
     * @return Article[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllArticles()
    {
        return $this->article->all();
    }

    /**
     * @param $table_field
     * @param $query
     * @return mixed
     */
    public function getSingleArticle($table_field, $query)
    {
        return $this->article->where($table_field, $query)->first();
    }

    /**
     * @param $table_field
     * @param $query
     * @return mixed
     */
    public function createArticle($data)
    {
        return $this->article->create($data);
    }

    /**
     * function to update article details
     *
     * @param $request
     * @return Article
     */
    public function updateArticle($request, $id)
    {
        $article = $this->getSingleArticle('id', $id);
        if (!$article) return 'Article to be updated not found';
        $article->update($request->toArray());
        return $article;
    }

    /**
     * function to delete article details
     *
     * @param $request
     * @return Article
     */
    public function deleteArticle($id)
    {
        $article = $this->getSingleArticle('id', $id);
        if (!$article) return 'Article to be deleted not found';
        return $article->delete();
    }

}
