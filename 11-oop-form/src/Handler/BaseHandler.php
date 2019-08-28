<?php

namespace Bootcamp\Handler;

use Bootcamp\App;
use Bootcamp\Request;
use Bootcamp\Response;

abstract class BaseHandler
{
    protected $app;

    public function __construct(App $app)
    {
        $this->app = $app;
    }

    public function __invoke(Request $request, Response $response) : Response
    {
        switch($request->method){
            case 'GET':
                return $this->get($request, $response);
                break;
            case 'POST':
                return $this->post($request, $response);
                break;
        }
    }

    public function get(Request $request, Response $response) : Response
    {
        return $response;
    }

    public function post(Request $request, Response $response) : Response
    {
        return $response;
    }
}
