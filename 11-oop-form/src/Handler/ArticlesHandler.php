<?php

namespace Bootcamp\Handler;

use Bootcamp\App;
use Bootcamp\Error404Exception;
use Bootcamp\Models\Article;
use Bootcamp\Models\Category;
use Bootcamp\Models\User;
use Bootcamp\Request;
use Bootcamp\Response;

class ArticlesHandler extends BaseHandler {

    protected $app;
    protected $articleModel;

    public function __construct(App $app)
    {
        $this->app = $app;
        $this->articleModel = new Article($app->db);
        $this->categoryModel = new Category($app->db);
        $this->userModel = new User($app->db);
    }

    public function get(Request $request, Response $response) : Response
    {

        $categoryId =  intval($request->queryParams['category'] ?? 0);
        $userId =  intval($request->queryParams['author'] ?? 0);

        $title = 'Artikel';

        if($categoryId != null){
            $category = $this->categoryModel->load($categoryId);

            if($category == null){
               throw new Error404Exception("Kategorie nicht gefunden");
            }

            $title = sprintf('Artikel aus der Kategorie: %s', $category->name);
            $articles = $this->articleModel->getArticlesByCategoryId($categoryId);

        } elseif($userId != null) {

            $user = $this->userModel->load($userId);

            if($user == null){
                throw new Error404Exception("Author nicht gefunden");
            }

            $title = sprintf('Artikel von: %s', $user->username);
            $articles = $this->articleModel->getArticlesByUserId($userId);
        } else {
            $articles = $this->articleModel->getArticles();
        }

        foreach($articles as $article){
            $article->loadUser();
            $article->loadCategories();
        }

        $viewData = [
            'articles' => $articles,
            'title' => $title
        ];

        $this->app->renderView('articles', $viewData);

        return $response;
    }
}
