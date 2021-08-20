<?php

use Symfony\Component\Security\Core\Security;

class MeController
{
    public function __construct(private Security $security)
    {
        $this->security=ùs
    }
    public function __invoke()
    {
        $user=$this->security->getUser();
        return $user;
        
    }
}

