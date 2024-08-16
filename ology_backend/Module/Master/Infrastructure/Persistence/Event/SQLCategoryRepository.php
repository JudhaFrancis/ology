<?php

namespace App\Infrastructure\Persistence\Event;

use App\Domain\Event\Category;
use App\Domain\Event\CategoryRepository;
use App\Models\Event\CategoryModel;
use Core\Domain\Exception\RecordNotFoundException;
use Core\Infrastructure\Persistence\DMLPersistence;

class SQLCategoryRepository implements CategoryRepository
{
    use DMLPersistence;

    /** @var AppModel */
    protected $model;

    public function __construct()
    {
        $this->model = new CategoryModel();
    }
    public function setEntity($d)
    {
        return new Category($d);
    }
    
}