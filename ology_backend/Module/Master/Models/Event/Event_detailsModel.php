<?php

namespace App\Models\Event;

use CodeIgniter\Model;

class Event_detailsModel extends Model
{
    private $appConstant;
    private $imageColum;
    public function __construct()
    {
        helper('Core\Helpers\File');
        $this->appConstant = new \Config\AppConstant();
        $this->imageColum = array('photo' => $this->appConstant->galleryImgPath);
    }
    protected $table      = 'posting';
    protected $primaryKey = 'id';
    protected $returnType = 'App\Domain\Event\Event_details';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id_category', 'event_name', 'description', 'photo', 'event_date', 'starting_time', 'ending_time', 'reg_link', 'registration_amount', 'venue', 'address', 'status',];
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
