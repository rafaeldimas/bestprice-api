<?php

namespace BestPrice\Units\Authentication\Http\Routes;

use BestPrice\Support\Http\Routing\RoutesFile;

class Api extends RoutesFile
{
    /**
     * @return mixed
     */
    protected function routes()
    {
        $this->router->get('test', function () {});
        $this->router->get('test1', function () {});
        $this->router->get('test2', function () {});
    }
}