<?php

namespace App\Domain\Event;

use CodeIgniter\Entity;

class Event extends Entity
{
    protected $attributes = [
        'event_type' => null, 'category_fk_id',
    ];
}
