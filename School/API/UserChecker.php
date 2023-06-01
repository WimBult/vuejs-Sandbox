<?php

namespace KeyVue\Application\Security;

use KeyVue\Domain\Exception\UserNotActiveException;
use KeyVue\Domain\Model\User;
use Symfony\Component\Security\Core\Exception\DisabledException;
use Symfony\Component\Security\Core\User\UserCheckerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class UserChecker implements UserCheckerInterface
{
    public function checkPreAuth(UserInterface $user): void
    {
        $this->validateUser($user);
    }

    public function checkPostAuth(UserInterface $user): void
    {
        $this->validateUser($user);
    }

    //checks if the user is active and if the user has an active license
    private function validateUser(UserInterface $user): void
    {
        if (!$user instanceof User) {
            return;
        }

        if (!$user->getCompany()->getLicense()){
            throw new DisabledException();
        }

        if(!$user->isActive()) {
            throw UserNotActiveException::byUser($user->getFullName());
        }
    }

}