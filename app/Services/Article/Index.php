<?php

namespace App\Services\Article;

use App\Repositories\ArticleRepository;

class Index
{
    private ArticleRepository $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function execute(): array
    {
        return $this->articleRepository->getAll();
    }
}
