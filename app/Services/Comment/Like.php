<?php

namespace App\Services\Comment;

use App\Repositories\CommentRepository;

class Like
{
    private CommentRepository $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function execute(int $id): void
    {
        $this->commentRepository->like($id);
    }
}
