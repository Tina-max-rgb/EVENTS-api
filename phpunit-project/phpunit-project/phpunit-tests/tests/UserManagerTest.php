<?php
use PHPUnit\Framework\TestCase;

class UserManagerTest extends TestCase
{
    public function testSuspendUserSendsNotification()
    {
        $user = new User(1, 'Bob', 'bob@example.com');

        $notifierMock = $this->createMock(NotifierInterface::class);
        $notifierMock->expects($this->once())
                     ->method('notify')
                     ->with($this->equalTo($user), $this->equalTo("Your account has been suspended."));

        $manager = new UserManager($notifierMock);
        $manager->suspendUser($user);

        $this->assertTrue($user->isSuspended());
    }
}
