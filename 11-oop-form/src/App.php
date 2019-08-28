<?php

namespace Bootcamp;

class App
{
    public $db;
    public $config;

    public function renderView(string $template, array $view) {
        $view['asset-path'] = $this->config['asset-path'];
        include sprintf('%s/%s.php', $this->config['template-path'], basename($template));
    }

    public function viewDate(int $timestamp) : string {
        return date($this->config['time-format'], $timestamp);
    }

    public function redirect($location) {
        header(sprintf('location: %s', $location));
        exit();
    }
}
