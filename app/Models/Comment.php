<?php

declare(strict_types=1);

namespace App\Models;

use App\Repositories\CommentRepository;

class Comment
{
    private CommentRepository $repository;

    public function __construct(CommentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(int $data): void
    {
        $this->repository->create($data);
    }

    public function delete(int $id): void
    {
        $this->repository->delete($id);
    }

    public function like(int $id): void
    {
        $this->repository->like($id);
    }
}
