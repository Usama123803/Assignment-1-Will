<?php 
namespace Modules\Home\Controllers;
use App\Controllers\BaseController;

class Home extends BaseController
{
	public function index()
	{	
		$data = [
					'title' => 'Home',
				];

		echo view('Modules\Home\Views\Header', $data);
		echo view('Modules\Home\Views\Home');
		echo view('Modules\Home\Views\Footer');				
	}
}
