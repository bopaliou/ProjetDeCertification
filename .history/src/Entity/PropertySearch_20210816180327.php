<?php
namespace App\Entity;

class PropertySearch
{
    private $type;
    public function getType(): ?string
    {
        return $this->id;
    }
    public function setType(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }


}