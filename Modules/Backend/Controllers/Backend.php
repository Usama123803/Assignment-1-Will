<?php 
namespace Modules\Backend\Controllers;
use App\Controllers\BaseController;

//Here we are only going to use query builders to get the information we wants
class Backend extends BaseController
{
    public function index()
    {
        echo view('Modules\Backend\Views\Header');
        echo view('Modules\Backend\Views\Side');
        echo view('Modules\Backend\Views\Body');
        echo view('Modules\Backend\Views\Footer');
    }

}
