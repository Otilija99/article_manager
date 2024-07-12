<?php

namespace App\Services\Article;

use App\Repositories\ArticleRepository;

class Show
{
    private ArticleRepository $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function execute(int $id): array
    {
        return $this->articleRepository->getById($id);
    }
}
