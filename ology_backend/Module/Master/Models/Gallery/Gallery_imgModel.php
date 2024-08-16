<?php

namespace App\Models\Gallery;

use CodeIgniter\Model;

class Gallery_imgModel extends Model
{
    private $appConstant;
    private $imageColum;
    public function __construct()
    {
        helper('Core\Helpers\File');
        $this->appConstant = new \Config\AppConstant();
        $this->imageColum = array('images' => $this->appConstant->galleryMultiImgPath);
    }
    protected $table      = 'gallery_img';
    protected $primaryKey = 'id';
    protected $returnType = 'App\Domain\Gallery\Gallery_img';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['gallery_fk_id', 'images',];
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
