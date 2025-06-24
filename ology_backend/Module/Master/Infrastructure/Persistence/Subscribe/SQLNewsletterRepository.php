<?php

namespace App\Infrastructure\Persistence\Subscribe;

use App\Domain\Subscribe\Newsletter;
use App\Domain\Subscribe\NewsletterRepository;
use App\Models\Subscribe\NewsletterModel;
use Core\Domain\Exception\RecordNotFoundException;
use Core\Infrastructure\Persistence\DMLPersistence;

class SQLNewsletterRepository implements NewsletterRepository
{
    use DMLPersistence;

    /** @var AppModel */
    protected $model;

    public function __construct()
    {
        $this->model = new NewsletterModel();
    }
    public function setEntity($d)
    {
        return new Newsletter($d);
    }
    public function findById($email_id){
        return $this->model
        ->where('Newsletter.email_id',$email_id)
        ->asArray()
        ->allowCallbacks(true)
        ->findAll();
    }
    public function save($data){
        print_r($data);
        return $this->model->save($data);
    }
}
