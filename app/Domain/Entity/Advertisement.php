<?php

namespace App\Domain\Entity;

class Advertisement
{
    public function __construct(
        private int     $id,
        private string  $title,
        private string  $description,
        private string  $url,
        private string  $action,
        private ?string $slug,
    )
    {
    }
}
