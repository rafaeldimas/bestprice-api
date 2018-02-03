<?php

namespace BestPrice\Units\Authentication\Http\Routes;

use BestPrice\Support\Http\Routing\RoutesFile;
use Illuminate\Http\Request;

class Api extends RoutesFile
{
    /**
     * @return mixed
     */
    protected function routes()
    {
        $this->registerRoutesByVersion('v1');
    }

    protected function registerRoutesByVersion(string $version = '')
    {
        $this->router->group(['prefix' => $version], function () {
            $this->registerRoutesUsers();
            $this->registerRoutesAuth();
        });
    }

    protected function registerRoutesUsers()
    {
        $this->router->get('user', function (Request $request) {
            return $request->user();
        })->middleware('auth:api');
    }

    protected function registerRoutesAuth()
    {
        $this->router->post('login', 'LoginController@login');
        $this->router->post('register', 'RegisterController@register');
    }
}