<?php

namespace App\Infrastructure\Persistence\Gallery;

use App\Domain\Gallery\Gallery_img;
use App\Domain\Gallery\Gallery_imgRepository;
use App\Models\Gallery\Gallery_imgModel;
use Core\Domain\Exception\RecordNotFoundException;
use Core\Infrastructure\Persistence\DMLPersistence;

class SQLGallery_imgRepository implements Gallery_imgRepository
{
    use DMLPersistence;

    /** @var AppModel */
    protected $model;

    public function __construct()
    {
        $this->model = new Gallery_imgModel();
    }
    public function setEntity($d)
    {
        return new Gallery_img($d);
    }
}
