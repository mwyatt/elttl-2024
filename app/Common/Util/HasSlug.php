<?php

namespace App\Common\Util;

use Exception;

trait HasSlug
{
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @throws Exception
     */
    private function generateSlug(string $name): string
    {
        $slugified = preg_replace('/\xE3\x80\x80/', ' ', $name);

        if (gettype($slugified) !== 'string') {
            throw new Exception('Unexpected slug format');
        }

        $slugified = str_replace('-', ' ', $slugified);
        $slugified = preg_replace('#[:\#\*"@+=;!><&\.%()\]\/\'\\\\|\[]#', "\x20", $slugified);

        if (gettype($slugified) !== 'string') {
            throw new Exception('Unexpected slug format, second phase');
        }

        $slugified = str_replace('?', '', $slugified);
        $slugified = trim(mb_strtolower($slugified, 'UTF-8'));
        return preg_replace('#\x20+#', '-', $slugified);
    }
}
