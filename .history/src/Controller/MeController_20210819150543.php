<?php

use Symfony\Component\Security\Core\Security;
use App\Controller;
class MeController
{
    public function __construct(private Security $security)
    {
        $this->security=$security;
    }
    public function __invoke()
    {
        $user=$this->security->getUser();
        return $user;
        
    }
}

