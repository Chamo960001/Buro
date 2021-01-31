<?php
namespace middlewares;

use app\Session;

class Middleware
{
    private $router;
    private $db;

    public function __construct($router, $db) {
        $this->router = $router;
        $this->db = $db;
    }

    protected function getRouter() {
        return $this->router;
    }

    protected function getDatabase() {
        return $this->db;
    }

    protected function redirectToUrl(String $url, Array $data = []) {
        foreach($data as $k => $v) {
            Session::put($k, $v);
        }

        header('Location: '.$url);
    }

    protected function redirectToRoute(String $route, Array $data = []) {
        $url = $this->router->generate($route);

        foreach($data as $k => $v) {
            Session::put($k, $v);
        }

        header('Location: '.$url);
        return true;
    }

}