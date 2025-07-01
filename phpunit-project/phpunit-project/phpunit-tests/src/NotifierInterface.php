<?php

interface NotifierInterface {
    public function notify(User $user, string $message): void;
}
