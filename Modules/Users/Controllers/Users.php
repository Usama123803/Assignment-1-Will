<?php 
namespace Modules\Users\Controllers;
use App\Controllers\BaseController;
use Modules\Users\Models\UsersModel;
use Modules\Logout;

class Users extends BaseController
{
	public function hh()
	{
		$usama = [
					'title' => 'Header',
				];
		return view('Modules\Users\Views\header',$usama);
	}

	public function index()
	{	


		if($this->request->getMethod() == 'post')
		{
			helper(['form']);
			$validation =  \Config\Services::validation();
			$rules = [
				'first_name' => ['label'=>'First Name', 'rules'=>'required', 'errors' =>'First Name is Required'],
				'last_name' => ['label'=>'Last Name', 'rules'=>'required', 'errors' =>'Last Name is Required'],
				'email' => ['label'=>'Email', 'rules'=>'required|valid_email|is_unique[persons.email]',
							'errors' =>[
										'required'=>'Email is Invalid',
										'valid_email'=>'Invalid Email',
										'is_unique'=>'Invalid Email',
										]],
				'password' => ['label'=>'Password', 'rules'=>'required', 'errors' =>'Password is Required'],
				'confirm_password' => 	['label'=>'Password Confirmation', 'rules'=>'required|matches[password]',
										'errors' =>[
													'required'=>'Confirm Password is Required',
													'matches' => 'Password & Confirm Password Don\'t Match',
													]],
			];

			$validation->setRules($rules);

			if($validation->withRequest($this->request)->run())
			{
				$encrypter = \Config\Services::encrypter();
				$password = bin2hex($encrypter->encrypt($_POST['password'])); //encrypt the password
				$reg_key = md5($_POST['email']); //set the email address as the registration key, email address is a unique value in the entire persons table
				$data = [
					'first_name'	=>	$_POST['first_name'],
					'last_name'		=>	$_POST['last_name'],
					'email'			=>	$_POST['email'],
					'phone'			=>	$_POST['phone'],
					'password'		=>	$password,
					'reg_key'		=>	$reg_key,
				];
				$model = new UsersModel();
				$model->save($data);
				$email = \Config\Services::email();

				$email->setFrom($email->SMTPUser, 'My Virtual Repair');
				$email->setTo($data['email']);

				$email->setSubject('Complete Your Registration');
				$regmessage  = 'Thank you ' . $data['first_name'] . ' ' . $data['last_name'] . ' for registering with My Virtual Repair!<br>';
				$regmessage .= 'In order to complete your registration, please click on the following link: <a href="' . site_url('/activate//'.$data['reg_key']) .'">Complete Registration</a>';
				$regmessage .= '<br><br>Sincerely,<br>Team MVR<br><a href="https://myvirtualrepair.com">https://myvirtualrepair.com</a>';

				$email->setMessage($regmessage);


				if (!$email->send())
				{
					session()->setFlashdata('error','Failed To Sent Email.');
				}else{
					session()->setFlashdata('success','Activation link sent, check your email.');
				}
			}
		}

		// $usama = [
		// 			'title' => 'Register',
		// 		];

		// $data['usama'] = array('title' => 'Register');

		// echo view('Modules\Users\Views\Register',['validation' => $this->validator, 'title' => 'Register']);
		echo view('Modules\Users\Views\Register',['validation' => $this->validator,'title' => 'Register']);

	}

	public function user_login()
	{
		
		if($this->request->getMethod() == 'post')
		{
			//Validate the login
			helper(['form']);
			$validation =  \Config\Services::validation();
			$rules = [
				'email' => ['label'=>'Email', 'rules'=>'required|valid_email',
							'errors' =>[
										'required'=>'Email is Required',
										'valid_email'=>'Invalid Email',
										]],
				'password' => ['label'=>'Password', 'rules'=>'required', 'errors' =>['required'=>'Password is Required']],
			];
			$validation->setRules($rules);
			if($validation->withRequest($this->request)->run())
			{
				$model = new UsersModel();
				$encrypter = \Config\Services::encrypter();

				$where =[
						'email'			=>$_POST['email'],
						'inactive'		=>0,
						'activated_on !='	=> null,
				];
				$user = $model->where($where)->first();
				if(!$user or $_POST['password'] != $encrypter->decrypt(hex2bin($user['password'])))
				{
					session()->destroy();
					session()->setFlashdata('error', 'Invalid Email or Password');
				}
				else{
					//set the session
					$sess_data=[
						'name'		=> $user['first_name'] . ' ' . $user['last_name'],
						'id'		=> bin2hex($encrypter->encrypt($user['id'])),
						'loggedin'	=> True,
					];
					session()->set($sess_data);
					return redirect()->to('/user_dash');
				}
			}

		}
		// echo view('Modules\Home\Views\Header');
		$usama = [
					'title' => 'Login',
				];

		echo view('Modules\Users\Views\Login', $usama,['validation' => $this->validator,]);
		// echo view('Modules\Home\Views\Footer');

	}

	public function user_forgot()
	{
		if($this->request->getMethod() == 'post')
		{
			helper(['form']);
			$validation =  \Config\Services::validation();
			$rules = [
				'email' => ['label'=>'Email', 'rules'=>'required|valid_email',
							'errors' =>[
										'required'=>'Email is Required',
										'valid_email'=>'Invalid Email',
										]
							]
			];
			$validation->setRules($rules);
			if($validation->withRequest($this->request)->run())
			{
				$model = new UsersModel();
				$encrypter = \Config\Services::encrypter();

				$where =[
						'email'			=>$_POST['email'],
						'inactive'		=>0,
						'activated_on !='	=> null,
				];
				$user = $model->where($where)->first();
				if($user){
					session()->setFlashdata('success','Check Your Email');
				}else{
					session()->setFlashdata('error','Invalid Email');
				}
			}

		}

		$usama = [
					'title' => 'Forgot Password',
				];

		echo view('Modules\Users\Views\Forgot', $usama ,['validation' => $this->validator,]);

	}

	private function user_info()
	{
		$model = new UsersModel();
		$encrypter = \Config\Services::encrypter();
		$where =[
				'id'			=>$encrypter->decrypt(hex2bin(session()->get('id'))),
				'inactive'		=>0,
				'activated_on !='	=> null,
		];
		return $model->select(['first_name','last_name','email','phone','password'])->where($where)->first();
		
	}

	private function garage_info()
	{
		$encrypter = \Config\Services::encrypter();
		$db = \Config\Database::connect();
		$sql = "select pg.id, pg.year, vma.make_name as 'make' , vmo.model_name as 'model'
        from personsgarage pg
        join vehiclemakes vma on vma.make_id = pg.make
        join vehiclemodels vmo on vmo.model_id  = pg.model 
        where pg.inactive =0 and pg.persons_id = " . $encrypter->decrypt(hex2bin(session()->get('id')));
		$sql .= " order by year desc, vma.make_name asc , vmo.model_name asc";
        $query = $db->query($sql);

		$gdata = $query->getResult();
		if(!$gdata)
		{
			return false;
		}
		return $gdata;
		
	}
	
	public function user_profile()
	{	
        if(!session()->has('loggedin') or !$this->user_info())
        {
			return redirect()->to('/logout');
        }

		//get the user data
		$user = $this->user_info();

		//get the garage information
		$garage = $this->garage_info();

		// if(!$user)
		// {
		// 	return redirect()->to('/logout');
		// }

		if($this->request->getMethod() == 'post')
		{
			helper(['form']);
			$encrypter = \Config\Services::encrypter();
			$validation =  \Config\Services::validation();
			$rules = [
				'first_name' => ['label'=>'First Name', 'rules'=>'required', 'errors' =>'First Name is Required'],
				'last_name' => ['label'=>'Last Name', 'rules'=>'required', 'errors' =>'Last Name is Required'],
				'current_password' =>	['label'=>'Current Password', 'rules'=>'required_with[new_password]', 
											'errors' =>[
														'required_with' => 'New Passwords Require Your Current Password',
														],
										],
			];

			$validation->setRules($rules);

			if($validation->withRequest($this->request)->run())
			{
				//if all basic validations passed, if the user is setting a new password, then we have to make sure their current password works
				if($_POST['new_password'] && $_POST['current_password'] != $encrypter->decrypt(hex2bin($user['password'])))
				{
					session()->setFlashdata('error', 'Invalid Current Password');
				}
				else
				{
					$data = [
						'first_name'	=>	$_POST['first_name'],
						'last_name'		=>	$_POST['last_name'],
						'phone'			=>	$_POST['phone'],
					];
					if($_POST['new_password'])
					{
						$password = bin2hex($encrypter->encrypt($_POST['new_password'])); //encrypt the password
						$data['password'] = $password;
					}
					$model = new UsersModel();
					$model->update($encrypter->decrypt(hex2bin(session()->get('id'))),$data);
					$user = $this->user_info();
					session()->setFlashdata('success','Profile Updated');
				}
			}
		}
		echo view('Modules\Templates\Views\Header');
		echo view('Modules\Templates\Views\Sides',[
			'validation' => $this->validator,
			'userdata'=>$user,
			'garage'=>$garage,
			]);
		echo view('Modules\Users\Views\Profile');
		echo view('Modules\Templates\Views\Footer');
	}

}
