<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\User;

class ArticlesController extends Controller
{
    /**
     * @var Article
     */
    private $articleModel;
    /**
     * @var Category
     */
    private $categoryModel;

    /**
     * Articles constructor.
     */
    public function __construct(Article $articleModel, Category $categoryModel)
    {
        $this->articleModel = $articleModel;
        $this->categoryModel = $categoryModel;
    }

    public function list()
    {
        $articles = $this->articleModel->getAll();

        $view = [
            'articles' => $articles,
            'title' => 'Artikel'
        ];

        return view('articles', $view);
    }

    public function author(int $userId)
    {
        $user = User::find($userId);

        if(!$user){
            abort(404);
        }

        $articles = $this->articleModel->getAll($userId);

        $view = [
            'articles' => $articles,
            'title' => 'Artikel von ' . $user->name
        ];

        return view('articles', $view);
    }

    public function category(int $categoryId)
    {
        $category = Category::find($categoryId);

        if(!$category){
            abort(404);
        }

        $articles = $category->articles()->get();

        $view = [
            'articles' => $articles,
            'title' => $category->name . ' Artikel'
        ];

        return view('articles', $view);
    }

    public function detail(int $id)
    {
        $article = Article::find($id);

        if($article != null){
            $view = [
                'article' => $article
            ];

            return view('article', $view);
        } else {
            abort(404);
        }
    }
}
