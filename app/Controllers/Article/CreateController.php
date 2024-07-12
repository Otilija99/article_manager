<?php

declare(strict_types=1);

namespace App\Controllers\Article;

use App\Response;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;

class CreateController
{
    private $articleModel;

    public function __construct(ContainerInterface $container)
    {
        $this->articleModel = $container->get('ArticleModel');
    }

    public function __invoke(Request $request, $response, $args)
    {
        $data = $request->getParsedBody();
        $this->articleModel->create($data);

        return new Response('/articles');
    }
}
