<?php

namespace App\Infrastructure\Persistence\Event;

use App\Domain\Event\Event;
use App\Domain\Event\EventRepository;
use App\Models\Event\EventModel;
use Core\Domain\Exception\RecordNotFoundException;
use Core\Infrastructure\Persistence\DMLPersistence;

class SQLEventRepository implements EventRepository
{
    use DMLPersistence;

    /** @var AppModel */
    protected $model;

    public function __construct()
    {
        $this->model = new EventModel();
    }
    public function setEntity($d)
    {
        return new Event($d);
    }
    
}