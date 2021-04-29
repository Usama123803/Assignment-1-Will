<?php 
namespace Modules\Home\Controllers;
use App\Controllers\BaseController;

class Logout extends BaseController
{
	public function index()
	{
        session()->destroy();
        return redirect()->to('/');
	}
}
