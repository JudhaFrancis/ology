<?php

namespace App\Infrastructure\Persistence\Gallery;

use App\Domain\Gallery\Gallery_video;
use App\Domain\Gallery\Gallery_videoRepository;
use App\Models\Gallery\Gallery_videoModel;
use Core\Domain\Exception\RecordNotFoundException;
use Core\Infrastructure\Persistence\DMLPersistence;

class SQLGallery_videoRepository implements Gallery_videoRepository
{
    use DMLPersistence;

    /** @var AppModel */
    protected $model;

    public function __construct()
    {
        $this->model = new Gallery_videoModel();
    }
    public function setEntity($d)
    {
        return new Gallery_video($d);
    }
}
