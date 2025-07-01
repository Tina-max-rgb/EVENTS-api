<?php

class UserRepository
{
    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function save(User $user): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO users (id, name, email) VALUES (:id, :name, :email)");
        $stmt->execute([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ]);
    }

    public function find(int $id): ?User
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }
        return new User($row['id'], $row['name'], $row['email']);
    }
}
