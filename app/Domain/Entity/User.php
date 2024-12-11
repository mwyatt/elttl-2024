<?php

namespace App\Domain\Entity;

class User
{
    public function __construct(
        private int    $id,
        private string $name,
    )
    {
    }
}
