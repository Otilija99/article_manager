<?php

namespace App\Services\Article;

use App\Repositories\ArticleRepository;

class Update
{
    private ArticleRepository $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function execute(int $id, array $data): void
    {
        $this->articleRepository->update($id, $data);
    }
}
