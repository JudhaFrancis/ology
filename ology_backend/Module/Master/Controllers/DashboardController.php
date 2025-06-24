<?php
namespace App\Controllers;
use Core\Models\Utility\UtilityModel;
use Core\Controllers\BaseController;

class DashboardController extends BaseController
{

    private $repository;
    private $role_repository;
    private $utility_repo;

    public function __construct()
    {
        $this->initializeFunction();
        $this->utility_repo         = new UtilityModel();
    }

    public function index()
    {

    }

    public function getData()
    {
        $data['total_zone'] = $this->utility_repo->countAll('zone');
        $data['total_region'] = $this->utility_repo->countAll('region');
        $data['total_field'] = $this->utility_repo->countAll('field');
        return $this->message(200, $data);

    }

    public function getWhetherUrl($city)
    {
        $client   = \Config\Services::curlrequest();
        $url      = 'https://forecast7.com/api/';
        $data = $this->getDataFromUrl('json');
        $response = $client->request('GET', $url . 'autocomplete/' . str_replace(" ", '-', $city));
        $res      = $response->getBody();
        $result      = json_decode($res)[0] ?? '';
        if ($result) {
            $response = $client->request('GET', $url . 'getUrl/' . str_replace(" ", '-', $result->place_id));
            $urls  =  $response->getBody();
            $result->data_url = $urls;
        }
        foreach ($data as $key => $value) {
            $result->{$key} =$value;
        }
        return $this->message(200, $result);
    }

}
