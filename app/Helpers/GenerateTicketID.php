<?php

namespace App\Helpers;

use App\Models\Admin\Ticket;

class GenerateTicketID
{
    public static function generateNumber($prefix)
    {
        $number = mt_rand(100000, 999999);

        // call the same function if the number exists already
        if (self::NumberExists($number)) {
            return self::generateNumber($prefix);
        }

        // otherwise, it's valid and can be used
        return $prefix.$number;
    }

    public static function NumberExists($number)
    {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        return Ticket::whereTicketId($number)->exists();
    }
}
