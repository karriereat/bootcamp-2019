<?php


use Bootcamp\Error404Exception;
use Bootcamp\Handler\ArticleHandler;
use Bootcamp\Handler\ArticlesHandler;
use Bootcamp\Request;
use Bootcamp\Response;

$app = require_once '../bootstrap.php';

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) use ($app) {
    $r->addRoute('GET', '/article/{id}', new ArticleHandler($app));
    $r->addRoute('GET', '/articles', new ArticlesHandler($app));
});

// Fetch method and URI
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $uri);

try {
    switch ($routeInfo[0]) {
        case FastRoute\Dispatcher::NOT_FOUND:
            throw new Error404Exception("Seite nicht gefunden");
            break;
        case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
            throw new Error404Exception("Seite nicht gefunden");
            break;
        case FastRoute\Dispatcher::FOUND:

            $handler = $routeInfo[1];

            $request = new Request(
                $uri,
                $_SERVER['REQUEST_METHOD'],
                $_GET,
                $routeInfo[2],
                getallheaders(),
                file_get_contents('php://input'),
                $_POST
            );

            $response = new Response();
            $response = $handler($request, $response);
            $response->render();
            break;
    }
} catch (\Bootcamp\BootcampException $e) {
    if(get_class($e) == Error404Exception::class){
        $view['error'] = $e->getMessage();
        http_response_code(404);
        $app->renderView('404', $view);
    }
}


