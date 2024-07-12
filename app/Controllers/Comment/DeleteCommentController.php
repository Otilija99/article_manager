<?php

declare(strict_types=1);

namespace App\Controllers\Comment;

use App\Response;
use Psr\Container\ContainerInterface;

class DeleteCommentController
{
    private $commentModel;

    public function __construct(ContainerInterface $container)
    {
        $this->commentModel = $container->get('CommentModel');
    }

    public function __invoke($request, $response, $args)
    {
        $id = (int) $args['id'];
        $this->commentModel->delete($id);

        return new Response('/articles');
    }
}
