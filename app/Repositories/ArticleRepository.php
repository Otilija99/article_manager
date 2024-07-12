<?php

declare(strict_types=1);

namespace App\Repositories;

use PDO;

class ArticleRepository
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAll(): array
    {
        $stmt = $this->db->query('SELECT * FROM articles');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById(int $id): ?array
    {
        $stmt = $this->db->prepare('SELECT * FROM articles WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function create(array $data): void
    {
        $stmt = $this->db->prepare('INSERT INTO articles (title, content) VALUES (:title, :content)');
        $stmt->execute([
            'title' => $data['title'],
            'content' => $data['content'],
        ]);
    }

    public function update(int $id, array $data): void
    {
        $stmt = $this->db->prepare('UPDATE articles SET title = :title, content = :content WHERE id = :id');
        $stmt->execute([
            'title' => $data['title'],
            'content' => $data['content'],
            'id' => $id,
        ]);
    }

    public function delete(int $id): void
    {
        $stmt = $this->db->prepare('DELETE FROM articles WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }

    public function like(int $id): void
    {
        $stmt = $this->db->prepare('UPDATE articles SET likes = likes + 1 WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }
}
