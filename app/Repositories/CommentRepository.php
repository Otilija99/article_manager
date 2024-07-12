<?php

declare(strict_types=1);

namespace App\Repositories;

use PDO;

class CommentRepository
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function create(array $data): void
    {
        $stmt = $this->db->prepare('INSERT INTO comments (article_id, content) VALUES (:article_id, :content)');
        $stmt->execute([
            'article_id' => $data['article_id'],
            'content' => $data['content'],
        ]);
    }

    public function delete(int $id): void
    {
        $stmt = $this->db->prepare('DELETE FROM comments WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }

    public function like(int $id): void
    {
        $stmt = $this->db->prepare('UPDATE comments SET likes = likes + 1 WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }
}
