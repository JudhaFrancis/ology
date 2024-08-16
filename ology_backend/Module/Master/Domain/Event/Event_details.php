<?php

namespace App\Domain\Event;

use CodeIgniter\Entity;

class Event_details extends Entity
{
    protected $attributes = [
        'id_category' => null, 'event_name' => null, 'description' => null, 'photo' => null, 'event_date' => null, 'starting_time' => null, 'ending_time' => null, 'reg_link' => null, 'registration_amount' => null, 'venue' => null, 'address' => null, 'status',
    ];
}
