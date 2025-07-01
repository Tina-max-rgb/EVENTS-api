<?php

class User
{
    private bool $suspended = false;
    public function __construct(public int $id = 0, public string $name = '', public string $email = '') {}

    public function suspend(): void
    {
        $this->suspended = true;
    }

    public function isSuspended(): bool
    {
        return $this->suspended;
    }
}
