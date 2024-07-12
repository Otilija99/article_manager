<?php

namespace App\Controllers\Comment;

use App\Models\Comment;
use App\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class CreateCommentController {
    private Comment $commentModel;

    public function __construct(Comment $commentModel) {
        $this->commentModel = $commentModel;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
        $data = $request->getParsedBody();
        $this->commentModel->create($args['id'], $data);
        return new Response('/article/' . $args['id']);
    }
}

