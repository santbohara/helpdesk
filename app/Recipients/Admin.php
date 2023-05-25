<?php
namespace App\Recipients;

class Admin extends Recipient
{
    public function __construct()
    {
        $this->email = config('app.ADMIN_EMAIL');
    }
}