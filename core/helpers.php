<?php

namespace Core\Helpers;

function truncate(string $text, int $lenght = 35)
{

    if (strlen($text) > $lenght) {
        $cut = substr($text, 0, $lenght);
        $cut = substr($cut, 0, strrpos($cut, ' '));
        return $cut . '...';
    } else {
        return $text;
    }
}
