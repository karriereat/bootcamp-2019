<?php

namespace Bootcamp\Handler;

use Bootcamp\App;
use Bootcamp\Models\Article;
use Bootcamp\Request;
use Bootcamp\Response;

class ArticleHandler extends BaseHandler {

    protected $app;
    protected $articleModel;

    public function __construct(App $app)
    {
        $this->app = $app;
        $this->articleModel = new Article($app->db);
    }

    public function get(Request $request, Response $response) : Response
    {
        $id = intval($request->routeParams['id']);

        /** @var Article $article */
        $article = $this->articleModel->load($id);

        if($article){

            $article->loadUser();
            $article->loadCategories();

            $viewData = [
                'article' => $article,
            ];

            $this->app->renderView('article', $viewData);
        } else {
            throw new Error404Exception("Author nicht gefunden");
        }

        return $response;
    }
}
