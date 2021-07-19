<?php

declare(strict_types=1);

class Request
{
    private array $get = [];
    private array $post = [];
    private array $server = [];

    public function __construct(array $get, array $post, array $server)
    {
        $this->get = $get;
        $this->post = $post;
        $this->server = $server;
    }

    public function getParam(string $name, $default = null)
    {
        return $this->get[$name] ?? $default;
    }

}