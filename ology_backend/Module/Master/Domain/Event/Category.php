<?php

namespace App\Domain\Event;

use CodeIgniter\Entity;

class Category extends Entity
{
    protected $attributes = [
        'category_name' => null,
    ];
}