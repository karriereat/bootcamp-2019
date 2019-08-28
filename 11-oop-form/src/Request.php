<?php

namespace Bootcamp;

class Request {
    public $uri;
    public $method;
    public $queryParams = [];
    public $routeParams = [];
    public $headers = [];
    public $rawBody;
    public $formBody;

    public function __construct(string $uri, string $method, array $queryParams, array $uriParams, array $headers, string $rawBody, array $formBody){
        $this->uri = $uri;
        $this->method = $method;
        $this->queryParams = $queryParams;
        $this->routeParams = $uriParams;
        $this->headers = $headers;
        $this->rawBody = $formBody;
        $this->formBody = $formBody;
    }
}
