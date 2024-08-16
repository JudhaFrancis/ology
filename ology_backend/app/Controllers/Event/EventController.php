<?php

namespace Core\Controllers\Event;

use App\Domain\Event\Category;
use App\Domain\Event\Event;
use App\Domain\Event\Event_details;
use Core\Controllers\BaseController;
use Core\Controllers\DMLController;
use App\Infrastructure\Persistence\Event\SQLCategoryRepository;
use App\Infrastructure\Persistence\Event\SQLEventRepository;
use App\Infrastructure\Persistence\Event\SQLEvent_detailsRepository;
use Core\Models\Utility\UtilityModel;   

class EventController extends BaseController
{
    use DMLController;
    private $Category_Repo;
    private $Event_Repo;
    private $Event_details_Repo;

    public function __construct()
    {
        helper('Core\Helpers\View');
        $this->initializeFunction();
        $this->Category_Repo = new SQLCategoryRepository();
        $this->Event_Repo = new SQLEventRepository();
        $this->Event_details_Repo = new SQLEvent_detailsRepository();
    }

    public function event()
    {
        $Data = $this->Category_Repo->findAll();
        $eventDetails = [];
        foreach ($Data as $item) {
            $eventDetails[$item['id']] = $this->Event_details_Repo->findAllByWhere(['id_category' => $item['id']]) ?? [];
        }
        return view('include/header')
            . view('pages/event', ['Data' => $Data, 'eventDetails' => $eventDetails])
            . view('include/footer');
    }
    public function event_details($id)
    {
        $reqData = $this->Event_details_Repo->findById($id);
        return view('include/header') 
            . view('pages/event_details', ['reqData' => $reqData]) 
            . view('include/footer');
    }

}