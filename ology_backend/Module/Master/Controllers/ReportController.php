<?php

namespace App\Controllers;

use App\Domain\User\UserLoginRepository;
use App\Infrastructure\Persistence\Asset\SQLAssetRepository;
use App\Infrastructure\Persistence\Customer\SQLCustomerRepository;
use App\Infrastructure\Persistence\Order\SQLOrder_itemsRepository;
use App\Infrastructure\Persistence\Order\SQLOrder_tblRepository;
use Config\Services;
use Core\Controllers\BaseController;
use Core\Controllers\DMLController;
use Core\Libraries\ExportExcel;
use Core\Models\Utility\UtilityModel;

class ReportController extends BaseController
{
	use DMLController;
	private $login_repository;
	private $utility_repo;
	private $orderRepo;
	private $orderItemsRepo;
	private $excelLib;
	private $customerRepo;
	public function __construct()
	{
		$this->initializeFunction();
		helper('Core\Helpers\File');
		helper('Core\Helpers\Utility');
		$this->login_repository = Services::UserLoginRepository();
		$this->utility_repo = new UtilityModel();
		$this->orderRepo=new SQLOrder_tblRepository();
		$this->orderItemsRepo=new SQLOrder_itemsRepository();
		$this->excelLib=new ExportExcel();
		$this->customerRepo=new SQLCustomerRepository();
	}

	public function index()
	{
	}

	public function genReport($module)
	{
		$data = $this->getDataFromUrl('json');
		// $cond = json_decode(utf8_decode(urldecode($cond))) ?? [];
		$cond = checkValue($data, 'condition');
		if (checkValue($data, 'is_active_only')) {
			$ob = (object) ['colName' => strtolower($module) . '.deleted_at is Null ', 'value' => null, 'operation' => 'AND'];
			array_push($cond, $ob);
		}
		$dataResult = [];
		switch (strtolower($module)) {
			case 'order':
				$result = $this->orderRepo->findAll();
				foreach ($result as $k => &$v) {
					$dE['basic'] = $v;
					if (isset($data['items'])) {
						$dE['items'] = $this->orderItemsRepo->findAllByWhere(['order_fk_id' => $v['id']]);
					}

					if (!empty($dE)) {
						array_push($dataResult, $dE);
					}
				}
				break;
			case 'customer':
				$result = $this->customerRepo->findAll();
				foreach ($result as $k => &$v) {
					$dE['basic'] = $v;
					if (!empty($dE)) {
						array_push($dataResult, $dE);
					}
				}
				break;
		}
		return $this->excelLib->export($dataResult, $data);
	}
}
