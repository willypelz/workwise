<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Library\RestFullResponse\ApiResponse;
use App\Http\Repository\ArticleRepository;
use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Http\Resources\v1\Articles\ArticleResource;
use App\Http\Resources\v1\Articles\ArticleResourceCollection;
use App\Http\Resources\v1\Articles\ExternalArticleResourceCollection;
use App\Http\Resources\v1\Articles\SingleArticleResource;
use App\Models\Article;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laravel\Lumen\Routing\Controller as BaseController;

class ArticlesController extends BaseController
{

    protected $articleRepository;
    protected $apiResponse;
    protected $articleResource;


    /**
     * ArticlesController constructor.
     * @param ArticleRepository $articleRepository
     * @param ApiResponse $apiResponse
     * @param ArticleResource $articleResource
     */
    public function __construct(
        ArticleRepository $articleRepository,
        ApiResponse $apiResponse,
        ArticleResource $articleResource
    )
    {
        $this->articleRepository = $articleRepository;
        $this->apiResponse = $apiResponse;
        $this->articleResource = $articleResource;
    }

    /**
     * @group Article
     *
     *  Article Collection
     *
     * An Endpoint to get all Article in the system
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @apiResourceCollection \App\Http\Resources\v1\Article\ArticleResourceCollection
     * @apiResourceModel \App\Models\Article
     */
    public function index(Request $request)
    {
        $articles = $this->articleRepository->getAllArticles();
        return $this->apiResponse->respondWithDataStatusAndCodeOnly(
            $this->articleResource->transformCollection($articles->toArray()), JsonResponse::HTTP_OK);
    }


    /**
     * @group Article
     *
     *  Articles Collection
     *
     * An Endpoint to store article in the system
     *
     * @param CreateArticleRequest $request
     * @param Article $article
     * @return \Illuminate\Http\JsonResponse
     * @apiResourceCollection \App\Http\Resources\v1\Article\ArticleResourceCollection
     * @apiResourceModel \App\Models\Article
     */
    public function store(Request $request, CreateArticleRequest $createArticleRequest)
    {
        $createArticleRequest->validate($request);
        $article = $this->articleRepository->createArticle($request->all());

        return $this->apiResponse->respondWithDataStatusAndCodeOnly(
            ['article' => $this->articleResource->transform($article)], JsonResponse::HTTP_CREATED);
    }


    /**
     * @group Article
     *
     *  Articles Collection
     *
     * An Endpoint to get single Article detail in the system
     *
     * @param Article $article
     * @return \Illuminate\Http\JsonResponse
     * @apiResourceCollection \App\Http\Resources\v1\Article\ArticleResourceCollection
     * @apiResourceModel \App\Models\Article
     */
    public function show($id)
    {
        $article = $this->articleRepository->getSingleArticle('id', $id);
        return $this->apiResponse->respondWithDataStatusAndCodeOnly(
            $this->articleResource->transform($article));
    }

    /**
     * An Endpoint to update the specified resource from storage.
     *
     * @param UpdateArticleRequest $request
     * @return void
     */
    public function update(Request $request, $id)
    {
       $updateArticleRequest->validate($request);
        $updatedArticle = $this->articleRepository->updateArticle($request, $id);
        if (is_string($updatedArticle)) return $this->apiResponse->respondWithError($updatedArticle);

        return $this->apiResponse->respondWithNoPagination(
            $this->articleResource->transform($updatedArticle),
            "The article $updatedArticle->name was updated successfully");
    }


    /**
     * An Endpoint to Remove the specified resource from storage.
     *
     * @param Article $article
     * @return void
     * @throws \Exception
     */
    public function destroy($id)
    {
        $deletedArticle = $this->articleRepository->deleteArticle($id);
        if (is_string($deletedArticle)) return $this->apiResponse->respondWithError($deletedArticle);
        return $this->apiResponse->respondDeleted("The article was deleted successfully");
    }

}
