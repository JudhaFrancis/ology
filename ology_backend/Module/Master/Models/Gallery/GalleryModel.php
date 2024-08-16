<?php

namespace App\Models\Gallery;

use CodeIgniter\Model;

class GalleryModel extends Model
{
    private $appConstant;
    private $imageColum;
    public function __construct()
    {
        helper('Core\Helpers\File');
        $this->appConstant = new \Config\AppConstant();
        $this->imageColum = array('title_image' => $this->appConstant->galleryImgPath);
    }
    protected $table      = 'gallery';
    protected $primaryKey = 'id';
    protected $returnType = 'App\Domain\Gallery\Gallery';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['gallery_title', 'description', 'title_image', 'video_url', 'status',];
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
