<?php

namespace App\Infrastructure\Persistence\Blog;

use App\Domain\Blog\Blog;
use App\Domain\Blog\BlogRepository;
use App\Models\Blog\BlogModel;
use Core\Domain\Exception\RecordNotFoundException;
use Core\Infrastructure\Persistence\DMLPersistence;

class SQLBlogRepository implements BlogRepository
{
    use DMLPersistence;

    /** @var AppModel */
    protected $model;

    public function __construct()
    {
        $this->model = new BlogModel();
    }
    public function setEntity($d)
    {
        return new Blog($d);
    }
    
}