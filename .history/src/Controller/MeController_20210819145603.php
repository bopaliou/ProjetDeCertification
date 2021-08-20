<?php

class MeController
{
    public function __construct(private Security $security)
    {
        $this->security=$security;
    }
}

