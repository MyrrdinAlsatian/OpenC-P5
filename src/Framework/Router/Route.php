<?php

namespace CustomFramework\Router;


/**
 * Class Route
 * 
 * Represent the route
 */
class Route
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var callable
     */
    protected $callback;
    /**
     * @var array
     */
    protected $parameters;

    public function __construct(string $name, callable $callback, array $parameters)
    {

        $this->name = $name;
        $this->callback = $callback;
        $this->parameters = $parameters;
    }

    /**
     * getName Return the Name of the route
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * getParams return the list of URL parameters
     *
     * @return string[]
     */
    public function getParams(): array
    {
        return $this->parameters;
    }
    /**
     * getCallback return the callback
     *
     * @return callable
     */
    public function getCallback(): callable
    {
        return $this->callback;
    }
}
