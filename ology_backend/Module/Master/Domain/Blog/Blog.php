<?php

namespace App\Domain\Blog;

use CodeIgniter\Entity;

class Blog extends Entity
{
    protected $attributes = [
        'title' => null, 'author' => null, 'description' => null, 'published_date' => null, 'status' => null, 'photo' => null,
    ];
}
