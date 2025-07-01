<?php

class UserManager
{
    public function __construct(private NotifierInterface $notifier) {}

    public function suspendUser(User $user): void
    {
        $user->suspend();
        $this->notifier->notify($user, "Your account has been suspended.");
    }
}
