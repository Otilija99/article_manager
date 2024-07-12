<?php

namespace App\Services\Article;

use App\Repositories\ArticleRepository;

class Like
{
    private ArticleRepository $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function execute(int $id): void
    {
        $this->articleRepository->like($id);
    }
}
