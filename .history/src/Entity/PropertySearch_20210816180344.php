<?php
namespace App\Entity;

class PropertySearch
{
    private $type;
    public function getType(): ?string
    {
        return $this->id;
    }
    public function setType(?string $type): self
    {
        $this->telephone = $type;

        return $this;
    }


}