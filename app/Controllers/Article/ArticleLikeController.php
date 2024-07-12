<?php

declare(strict_types=1);

namespace App\Controllers\Article;

use App\Response;
use Psr\Container\ContainerInterface;

class ArticleLikeController
{
    private $articleModel;

    public function __construct(ContainerInterface $container)
    {
        $this->articleModel = $container->get('ArticleModel');
    }

    public function __invoke($request, $response, $args)
    {
        $id = (int) $args['id'];
        $this->articleModel->like($id);

        return new Response('/articles');
    }
}
