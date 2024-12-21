<?php

namespace App\Domain\Entity;

use Illuminate\Contracts\Support\Arrayable;

class Advertisement implements Arrayable
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

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'url' => $this->url,
            'action' => $this->action,
            'slug' => $this->slug,
        ];
    }
}
