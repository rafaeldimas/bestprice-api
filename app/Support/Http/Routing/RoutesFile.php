<?php

namespace BestPrice\Support\Http\Routing;


abstract class RoutesFile
{
    /**
     * @var array
     */
    protected $options;

    /**
     * @var \Illuminate\Routing\Router
     */
    protected $router;

    /**
     * RoutesFile constructor.
     * @param array $options
     */
    public function __construct($options = [])
    {
        $this->options = $options;
        $this->router = app('router');
    }

    /**
     *
     */
    public function register()
    {
        $this->router->group($this->options, function () {
            $this->routes();
        });
    }

    /**
     * @return mixed
     */
    abstract protected function routes();
}