<?php

namespace App\Domain\Blog;

use CodeIgniter\Entity;

class Blog_details extends Entity
{
    protected $attributes = [
        'main_title' => null, 'sub_title' => null, 'main_heading' => null, 'sub_heading' => null, 'main_titile_text' => null, 'sub_title_text' => null,
        'main_heading_text' => null, 'sub_heading_text' => null, 'description' => null,
    ];
}
