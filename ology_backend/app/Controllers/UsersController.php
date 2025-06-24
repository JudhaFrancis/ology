<?php

namespace Core\Controllers;

use App\Infrastructure\Persistence\Events\SQLEvent_locationRepository;
use App\Libraries\Email as LibrariesEmail;
use Config\Services;
use Core\Domain\Exception\RecordNotFoundException;
use Core\Domain\Role\User_role;
use Core\Domain\User\UserLogin;
use Core\Domain\User\UserLoginRepository;
use Core\Domain\User\UserRepository;
use Core\Infrastructure\Persistence\Role\SQLUser_roleRepository;
use Core\Libraries\EmailConetentGenerator;
use Core\Models\Logs\LogsModel;
use App\Libraries\Email;

class UsersController extends BaseController
{

	private $repository;
	private $role_repository;
	private $login_repository;
	private $logsModel;
	public function __construct()
	{
		$this->initializeFunction();
		$this->repository = Services::UserRepository();
		$this->login_repository = Services::UserLoginRepository();
		$this->role_repository = new SQLUser_roleRepository();
		$this->logsModel = new LogsModel();
	}

	public function index()
	{

		//$this->UserListing();
	}

	public function UserListing($tblLazy, $activeUser = true)
	{
		$ftbl;
		$isActive = ($activeUser === 'false') ? false : true;

		if ($tblLazy) {
			$ftbl = json_decode(utf8_decode(urldecode($tblLazy)));
		}
		$data = $this->login_repository->findAllUserPagination($ftbl, $isActive);
		return $this->message(200, $data);
	}

	public function addUser()
	{
		$userRole = array();
		$data = $this->getDataFromUrl('json');
		$userRole = $data['role'] ?? [];
		$userLogin = new UserLogin($data);
		try {
			$userId = isset($data['user_id']) ? $data['user_id'] : '';
			if (empty($userId)) {
				$userId          = $this->login_repository->addNewUser($userLogin);
				$data['user_id'] = (int) $userId;
			} else if ($userId) {
				$userLogin = $userLogin->toRawArray();
				if (checkValue($data, 'password')) {
					$updateData = ['password' => md5($data['password'])];
				} else {
					$updateData          = $this->login_repository->findAllByWhere(['user_id' => $userId])[0] ?? [];
				}
				$updateData['fname'] = $data['fname'] ?? '';
				$updateData['lname'] = $data['lname'] ?? '';
				$updateData['email_id'] = $data['email_id'] ?? '';
				$this->login_repository->update(array('user_id' => $userId), $updateData);
				if ($userId) {
					$this->role_repository->deleteOfId($userId);
					foreach ($userRole as $row) {
						$row['user_id'] = $userId;
						foreach ($row as $k => $value) {
							$row[$k] = strlen($row[$k]) ? $row[$k] : NULL;
						}
						$this->role_repository->insert(new User_role($row));
					}
				}
			}
		} catch (RecordNotFoundException $e) {
			return $this->message(404, $e->getMessage());
		}
		return $this->message(200, $data);
	}

	public function isEmailUnique($email)
	{
		$data = $this->login_repository->findAllByWhere(['user_login.email_id' => $email])[0] ?? [];
		if (!empty($data)) {
			$data = false;
		} else {
			$data = true;
		}
		return $this->message(200, $data);
	}

	public function isUnique($field, $email)
	{
		$result = $this->login_repository->findUserUnique($field, $email);
		return $this->message(200, $result);
	}

	public function getUserDetail($id)
	{
		if (strtolower($this->reqMethod) == 'get') {
			$data = $this->login_repository->findById($id);
			$roleData = $this->role_repository->findByRoleId($id);
			$data['role'] = $roleData;
			return $this->message(200, $data);
		} else {
			return $this->message(400, null, 'Method Not Allowed');
		}
	}

	public function create()
	{

		$token = $this->token_get();
		try {
			//    $album = $this->repository->findAlbumOfId($id);
			$data = $this->repository->findUserOfId(1);
		} catch (RecordNotFoundException $e) {
			//throw new PageNotFoundException($e->getMessage());
			return $this->message(404, $e->getMessage());
		}
		return $this->message(200, $data);
	}

	public function deleteUser($id)
	{
		if ($id) {
			if ($this->login_repository->deleteOfId($id)) {
				return $this->message(200, $id, 'Success');
			} else {
				return $this->message(400, null, 'Failed to Delete');
			}
		}
	}

	public function makeActive($id)
	{
		if ($id) {
			if ($this->login_repository->update(array('user_id' => $id), array('deleted_at' => null))) {
				return $this->message(200, $id, 'Success');
			} else {
				return $this->message(400, null, 'Failed to Inactive');
			}
		}
	}

	public function show404()
	{
		return $this->message(400, null, 'Method Not Allowed');
	}
	public function contactSendMail()
	{
		$req = $this->getDataFromUrl('json');
		$email = new Email();
		if (!checkValue($req, 'email')) {
			return $this->message(400, null, 'User Data Not Found');
		}
		$db = \Config\Database::connect();
		$jsonData = json_encode($req);
		$builder = $db->table('contact_data');
		$res = $builder->insert(['data' => $jsonData]);
		$data = ['to' => $req['email'], 'subject' => 'Thank You for Reaching Out to OlogyGirls!', 'cc' => '', 'bcc' => ''];
		$data['body'] = '<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<style>
				body {
					font-family: Arial, sans-serif;
					color: #333;
					margin: 0;
					padding: 0;
				}
				.container {
					width: 80%;
					margin: auto;
					padding: 20px;
					background-color: #f9f9f9;
					border: 1px solid #ddd;
					border-radius: 8px;
				}
			  
				p {
					line-height: 1.6;
				}
				.contact-info {
					margin-top: 20px;
				}
				.contact-info a {
					color: #007BFF;
					text-decoration: none;
				}
				.contact-info a:hover {
					text-decoration: underline;
				}
				.footer {
					margin-top: 20px;
					font-size: 0.9em;
					color: #777;
				}
			</style>
		</head>
		<body>
			<div class="container">
				<h1>Thank You for Reaching Out to OlogyGirls!</h1>
				<p>Dear subscriber,</p>
				<p>Thank you for taking the time to connect with us! At OlogyGirls, we genuinely value your voice and your opinion. Our dedicated team is here to support and empower you every step of the way.</p>
				<div class="contact-info">
					<p>Feel free to reach out to us at:</p>
					<p><a href="tel:+919176468468">+91-9176468468</a> / <a href="tel:+919087211115">+91-9087211115</a></p>
				</div>
				<div class="footer">
					<p>Warm regards,<br>OlogyGirls Team</p>
				</div>
			</div>
		</body>
		</html>
		';
		$res = $email->send($data);

		return $this->message($res ? 200 : 400, null, $res ? "Mail Send SuccessFull" : "Failed");
	}
}
