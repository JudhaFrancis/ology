<?php

namespace App\Domain\Gallery;

use CodeIgniter\Entity;

class Gallery extends Entity
{
    protected $attributes = [
        'gallery_title' => null, 'description' => null, 'title_image' => null, 'video_url' => null,
    ];
}
