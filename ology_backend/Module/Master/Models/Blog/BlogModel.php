<?php

namespace App\Models\Blog;

use CodeIgniter\Model;

class BlogModel extends Model
{
    private $appConstant;
    private $imageColum;
    public function __construct()
    {
        helper('Core\Helpers\File');
        $this->appConstant = new \Config\AppConstant();
        $this->imageColum = array('photo' => $this->appConstant->blogImgPath);
    }
    protected $table      = 'banner';
    protected $primaryKey = 'id';
    protected $returnType = 'App\Domain\Blog\Blog';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['title','author','description','published_date', 'photo', 'status'];
    protected $useTimestamps = false;
    protected $beforeInsert = ['beforeSave'];
    protected $beforeUpdate = ['beforeSave'];
    protected $afterFind = ['addImageRealPath'];
    protected $allowCallbacks = true;

    public function beforeSave(array $data)
    {
        $data['data'] = modelFileHandler($data['data'], $this->imageColum);
        return $data;
    }
    protected function addImageRealPath(array $data)
    {
        $data['data'] = addImageRealPath($data['data'], $this->imageColum);
        return $data;
    }

}
