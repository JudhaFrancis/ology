<?php

namespace App\Domain\Gallery;

use CodeIgniter\Entity;

class Gallery_video extends Entity
{
    protected $attributes = [
        'gallery_fk_id' => null, 'video_url' => null,
    ];
}
