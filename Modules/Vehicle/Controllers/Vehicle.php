<?php 
namespace Modules\Vehicle\Controllers;
use App\Controllers\BaseController;
use Modules\Vehicle\Models\GarageModel;
use Modules\Vehicle\Models\MakesModel;

//Here we are only going to use query builders to get the information we wants
class Vehicle extends BaseController
{
    private function get_makes()
    {
        $makes = new MakesModel();
        $themakes = $makes->select(['make_id', 'make_name'])->where(['include'=>1])->orderBy('make_name','ASC')->asArray()->find();

        $data=[];
        array_push($data,
                ['make_id'=>"", 'make_name'=>'Select a Make']
            );

        foreach ($themakes as $md) {
            array_push($data,
                ['make_id'=>$md['make_id'], 'make_name'=>$md['make_name']]
            );
        }

        return $data;
    }
    public function add_vehicle()
    {
		if($this->request->getMethod() == 'post')
		{
			helper(['form']);
            $data = $this->request->getPost();
            $encrypter = \Config\Services::encrypter();
            $data['persons_id'] = $encrypter->decrypt(hex2bin(session()->get('id')));
            $garage = new GarageModel();
            $garage->save($data);

            session()->setFlashdata('success','Car Added');
            return redirect()->to('/user_profile');
        }
        else
        {
            $db      = \Config\Database::connect();
            $makebuilder = $db->table('vehiclemakes');
            $makebuilder->select(['make_id','make_name']);
            $makebuilder->Where(['include'=>1]);
            $makebuilder->orderBy('make_name','ASC');
            $makesdata = $makebuilder->get()->getResult();
            $count = $makebuilder->countAllResults();

            //make sure we have makes
            if(!$count)
            {
                echo "There are no makes";
                die;
            }
            $data=[];
            array_push($data,
                    ['make_id'=>"", 'make_name'=>'Select a Make']
                );
            foreach ($makesdata as $md) {
                array_push($data,
                    ['make_id'=>$md->make_id, 'make_name'=>$md->make_name]
                );
            }
        }
        echo view('Modules\Templates\Views\Header');
        echo view('Modules\Templates\Views\Sides');
		echo view('Modules\Vehicle\Views\VehicleAdd',['validation' => $this->validator,'themakes'=>$data]);
        echo view('Modules\Templates\Views\Footer');
    }

    public function edit_vehicle($id = null)
    {
        $the_type = $this->request->getMethod();

        if($the_type == 'get')
        {
            $id = $this->request->uri->getSegment(2);
            if(!$id)
            {
                return redirect()->to('/logout');
            }

            //get all the information based on the ID passed
            $mygarage = new GarageModel();
            $mycar = $mygarage->select(['id', 'make','model','year','notes'])->where(['id'=>$id])->get()->getResult()[0];
            if(!$mycar)
            {
                return redirect()->to('/user_profile');
            }
            $data = $this->get_makes();
            echo view('Modules\Templates\Views\Header');
            echo view('Modules\Templates\Views\Sides');
            echo view('Modules\Vehicle\Views\VehicleEdit',['validation' => $this->validator,'themakes'=>$data, 'mycar'=>$mycar]);
            echo view('Modules\Templates\Views\Footer');
        }
        if($the_type == 'post')
        {
            $garage = new GarageModel();

            $data = $this->request->getPost();
            $msg = 'Car Updated';
            if(isset($data['inactive']))
            {
                $msg = 'Car Deleted';
                $data['inactive'] = 1;
            }
            $id = $data['id'];
            $data = array_slice($data,1,count($data));
            $garage->update($id,$data);
            session()->setFlashdata('success',$msg);
            return redirect()->to('/user_profile');
            // $db = \Config\Database::connect();
            // $car = $db->table('personsgarage');
            // $car->where('id'=>$id);
        }
        
    }
    // public function edit_vehicle($id = null)
    // {
    //     // if($this->request->getMethod() == 'get')
    //     // {
    //         //get all the information based on the ID passed
    //         // $db = \Config\Database::connect();
    //         // $car = $db->table('personsgarage');
    //         // $mycar = $car->select(['make','model','year','notes'])->where(['id'=>$id])->get()->getResult()[0];
    //         // if(!$mycar)
    //         // {
    //         //     return redirect()->to('/user_profile');
    //         // }
    //         // $data = $this->get_makes();
    //     // }
	// 	// if($this->request->getMethod() == 'post')
	// 	// {
	// 	// 	helper(['form']);
    //     //     $data = $this->request->getPost();
    //     //     $encrypter = \Config\Services::encrypter();
    //     //     $data['persons_id'] = $encrypter->decrypt(hex2bin(session()->get('id')));
    //     //     $db      = \Config\Database::connect();
    //     //     $garage = $db->table('personsgarage');
    //     //     $garage->insert($data);

    //     //     session()->setFlashdata('success','Car Added');
    //     //     return redirect()->to('/user_profile');
    //     // // }
    //     // echo view('Modules\Users\Views\Header');
    //     // echo view('Modules\Users\Views\Sides');
	// 	// echo view('Modules\Vehicle\Views\VehicleEdit',['validation' => $this->validator,'themakes'=>$data]);
    //     // echo view('Modules\Users\Views\Footer');
    //     // echo view('Modules\Users\Views\Header');
    //     // echo view('Modules\Users\Views\Sides');
	// 	// echo view('Modules\Vehicle\Views\VehicleEdit2',['validation' => $this->validator,'themakes'=>$data, 'mycar'=>$mycar]);
    //     // echo view('Modules\Users\Views\Footer');
    // }

    public function getmodels()
    {
        helper(['form']);
        $make_id = $this->request->getPost('yourmake');
        $db = \Config\Database::connect();
        $modelbuilder = $db->table('vehiclemodels');
        $modelbuilder->select(['model_id','model_name']);
        $modelbuilder->Where(['make_id'=>$make_id]);
        // echo $modelbuilder->countAllresults();
        $modelbuilder->orderBy('model_name','ASC');
        $modeldata = $modelbuilder->get()->getResult();
        // print_r($modeldata);
        $modelselect = "";
        if($modeldata)
        {
            $modelselect ="<select class=\"form-control form-control-line\" id=\"select_model\" name=\"model\">";
            foreach ($modeldata as $md)
            {
                $modelselect.="<option value='".$md->model_id."' >".ucwords($md->model_name)."</option>";
            }
            $modelselect .="<\select>";
        }
        $yselect = $this->getyears();
        $data = array($modelselect,$yselect);
        echo json_encode($data);
    }

    private function getyears()
    {
        $db = \Config\Database::connect();
        $ybuilder = $db->table('vehicleyears');
        $ybuilder->select(['years']);
        $ybuilder->orderBy('years','DESC');
        $ydata = $ybuilder->get()->getResult();
        
        $yselect = "";
        if($ydata)
        {
            $yselect ="<select class=\"form-control form-control-line\" id=\"select_year\" name=\"year\">";
            foreach ($ydata as $yd)
            {
                $yselect.="<option value='".$yd->years."'>".$yd->years."</option>";
            }
            $yselect .="<\select>";
        }
        return $yselect;
    }
}
