<?php

declare(strict_types=1);

namespace App\Controllers\Article;

use App\Response;

class CreateFormController
{
    public function __invoke($request, $response, $args)
    {
        return new Response('articles/create');
    }
}

