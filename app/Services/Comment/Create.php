<?php

namespace App\Services\Comment;

use App\Repositories\CommentRepository;

class Create
{
    private CommentRepository $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function execute(array $data): void
    {
        $this->commentRepository->create($data);
    }
}
