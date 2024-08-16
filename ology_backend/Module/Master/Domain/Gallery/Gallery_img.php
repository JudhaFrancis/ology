<?php

namespace App\Domain\Gallery;

use CodeIgniter\Entity;

class Gallery_img extends Entity
{
    protected $attributes = [
        'gallery_fk_id' => null, 'images' => null,
    ];
}
