<?php

declare(strict_types=1);

namespace App\Models;

use App\Repositories\ArticleRepository;

class Article
{
    private ArticleRepository $repository;

    public function __construct(ArticleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll(): array
    {
        return $this->repository->getAll();
    }

    public function getById(int $id): ?array
    {
        return $this->repository->getById($id);
    }

    public function create(array $data): void
    {
        $this->repository->create($data);
    }

    public function update(int $id, array $data): void
    {
        $this->repository->update($id, $data);
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
