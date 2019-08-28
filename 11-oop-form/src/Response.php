<?php

namespace Bootcamp;

class Response {
    public $status = 200;
    public $headers = [];
    public $body = '';

    public function render(){
        foreach($this->headers as $header => $value){
            header(sprintf('%s: %s'), $header, $value);
        }

        http_response_code($this->status);

        echo $this->body;
    }
}
