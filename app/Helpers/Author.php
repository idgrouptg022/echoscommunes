<?php

namespace App\Helpers;

use App\Models\User;

class Author
{
    public static function getName($value)
    {
        if ($value instanceof User) {
            return "La rédaction";
        } else {
            return $value->name;
        }
    }
}
