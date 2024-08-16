<?php

namespace App\Infrastructure\Persistence\Gallery;

use App\Domain\Gallery\Gallery;
use App\Domain\Gallery\GalleryRepository;
use App\Models\Gallery\GalleryModel;
use Core\Domain\Exception\RecordNotFoundException;
use Core\Infrastructure\Persistence\DMLPersistence;

class SQLGalleryRepository implements GalleryRepository
{
    use DMLPersistence;

    /** @var AppModel */
    protected $model;

    public function __construct()
    {
        $this->model = new GalleryModel();
    }
    public function setEntity($d)
    {
        return new Gallery($d);
    }
    
}
