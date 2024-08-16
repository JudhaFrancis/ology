<?php

namespace App\Models\Event;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    public function __construct()
    {
        helper('Core\Helpers\File');
    }
    protected $table      = 'category';
    protected $primaryKey = 'id';
    protected $returnType = 'App\Domain\Event\Category';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['category_name'];
    protected $useTimestamps = false;
    protected $allowCallbacks = true;

}
