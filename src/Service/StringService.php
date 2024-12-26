<?php

namespace App\Service;

class StringService
{
    public function shorten(string $string, int $maxCharacters, bool $obeyWordBoundaries): string
    {
        $string = mb_substr($string, 0, $maxCharacters);

        if ($obeyWordBoundaries) {
            $position = mb_strrpos($string, ' ');

            return mb_substr($string, 0, $position);
        }

        return $string;
    }
}