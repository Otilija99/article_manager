<?php

declare(strict_types=1);

namespace App\Controllers\Article;

use App\Response;
use Psr\Container\ContainerInterface;

class GetAllController
{
    private $articleModel;

    public function __construct(ContainerInterface $container)
    {
        $this->articleModel = $container->get('ArticleModel');
    }

    public function __invoke($request, $response, $args)
    {
        $articles = $this->articleModel->getAll();

        return new Response('articles/index', ['articles' => $articles]);
    }
}
