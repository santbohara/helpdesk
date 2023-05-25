<?php
namespace App\Recipients;

class Customer extends Recipient
{
    public function __construct($email)
    {
        $this->email = $email;
    }
}