<?php

namespace App\Services\Article;

use App\Repositories\ArticleRepository;

class Create
{
    private ArticleRepository $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function execute(array $data): void
    {
        $this->articleRepository->create($data);
    }
}
