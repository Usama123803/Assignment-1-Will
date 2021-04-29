<?php 
namespace Modules\Users\Controllers;
use App\Controllers\BaseController;


class Dashboard extends BaseController
{

	public function index()
	{	
        if(!session()->has('loggedin'))
        {
            session()->destroy();
            return redirect()->to('/');
        }
		echo view('Modules\Templates\Views\Header');
		echo view('Modules\Templates\Views\Sides');
		echo view('Modules\Users\Views\Body');
		echo view('Modules\Templates\Views\Footer');
		// echo view('Modules\Users\Views\Dash',['validation' => $this->validator,]);
		
		// echo view('Modules\Home\Views\Footer');
	}
}
