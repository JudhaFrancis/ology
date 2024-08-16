<?php

namespace App\Infrastructure\Persistence\Blog;

use App\Domain\Blog\Blog_details;
use App\Domain\Blog\Blog_detailsRepository;
use App\Models\Blog\Blog_detailsModel;
use Core\Domain\Exception\RecordNotFoundException;
use Core\Infrastructure\Persistence\DMLPersistence;

class SQLBlog_detailsRepository implements Blog_detailsRepository
{
    use DMLPersistence;

    /** @var AppModel */
    protected $model;

    public function __construct()
    {
        $this->model = new Blog_detailsModel();
    }
    public function setEntity($d)
    {
        return new Blog_details($d);
    }
    
}