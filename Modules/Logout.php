<?php 
namespace Modules;
use App\Controllers\BaseController;

class Logout extends BaseController
{

	public function index()
	{	
		session()->destroy();
		return redirect()->to('/');
		
	}

}
