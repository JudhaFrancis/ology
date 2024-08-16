<?php

namespace App\Infrastructure\Persistence\Event;

use App\Domain\Event\Event_details;
use App\Domain\Event\Event_detailsRepository;
use App\Models\Event\Event_detailsModel;
use Core\Domain\Exception\RecordNotFoundException;
use Core\Infrastructure\Persistence\DMLPersistence;

class SQLEvent_detailsRepository implements Event_detailsRepository
{
    use DMLPersistence;

    /** @var AppModel */
    protected $model;

    public function __construct()
    {
        $this->model = new Event_detailsModel();
    }
    public function setEntity($d)
    {
        return new Event_details($d);
    }
}
