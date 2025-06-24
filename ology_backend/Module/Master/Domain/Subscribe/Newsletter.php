<?php

namespace App\Domain\Subscribe;

use CodeIgniter\Entity;

class Newsletter extends Entity
{
    protected $attributes = [
        'email_id' => null, 'name' => null, 'send_on' => null,
    ];
}