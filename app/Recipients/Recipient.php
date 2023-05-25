<?php
namespace App\Recipients;

use Illuminate\Notifications\Notifiable;

abstract class Recipient
{

    use Notifiable;

    protected $email;
}