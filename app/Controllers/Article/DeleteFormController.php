<?php

declare(strict_types=1);

namespace App\Controllers\Article;

use App\Response;

class DeleteFormController
{
    public function __invoke($request, $response, $args)
    {
        $id = (int) $args['id'];
        return new Response('articles/delete', ['id' => $id]);
    }
}
