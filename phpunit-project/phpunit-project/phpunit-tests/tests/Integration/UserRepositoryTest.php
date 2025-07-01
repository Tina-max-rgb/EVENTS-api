<?php
use PHPUnit\Framework\TestCase;

class UserRepositoryTest extends TestCase
{
    private \PDO $pdo;
    private UserRepository $repo;

    protected function setUp(): void
    {
        $this->pdo = new \PDO(getenv('DB_DSN'));
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $this->pdo->exec("CREATE TABLE users (id INTEGER PRIMARY KEY, name TEXT, email TEXT)");
        $this->repo = new UserRepository($this->pdo);
    }

    public function testSaveAndFindUser()
    {
        $user = new User(1, 'Alice', 'alice@example.com');
        $this->repo->save($user);

        $retrieved = $this->repo->find(1);

        $this->assertNotNull($retrieved);
        $this->assertEquals('Alice', $retrieved->name);
        $this->assertEquals('alice@example.com', $retrieved->email);
    }

    protected function tearDown(): void
    {
        $this->pdo = null;
    }
}
