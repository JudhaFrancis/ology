<?php

namespace Core\Controllers\Gallery;

use App\Domain\Gallery\Gallery;
use App\Domain\Gallery\Gallery_img;
use Core\Controllers\BaseController;
use Core\Controllers\DMLController;
use App\Infrastructure\Persistence\Gallery\SQLGalleryRepository;
use App\Infrastructure\Persistence\Gallery\SQLGallery_imgRepository;
use Core\Models\Utility\UtilityModel;   

class GalleryController extends BaseController
{
    use DMLController;
    private $Gallery_Repo;
    private $Gallery_Img_Repo;

    public function __construct()
    {
        helper('Core\Helpers\View');
        $this->initializeFunction();
        $this->Gallery_Repo = new SQLGalleryRepository();
        $this->Gallery_Img_Repo = new SQLGallery_imgRepository();
    }

    public function galleries()
    {
        $Data = $this->Gallery_Repo->findAll();
        return view('include/header') 
                . view('pages/galleries', ['Data' => $Data]) 
                . view('include/footer');
    }

    public function gallery($id)
    {
        $reqData = $this->Gallery_Repo->findById($id);
        $reqData['gallery_img'] = $this->Gallery_Img_Repo->findAllByWhere(['gallery_fk_id'=>$reqData['id']])??[];
        return view('include/header') 
            . view('pages/gallery', ['reqData' => $reqData]) 
            . view('include/footer');
    }
}
