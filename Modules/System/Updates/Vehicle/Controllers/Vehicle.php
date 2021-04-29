<?php 
namespace Modules\System\Updates\Vehicle\Controllers;
use App\Controllers\BaseController;
use Modules\System\Updates\Vehicle\Models\VehicleMake;
use Modules\System\Updates\Vehicle\Models\VehicleModel;

class Vehicle extends BaseController
{
    public function getmakes()
    {
        try {
            $model = new VehicleMake();
    
            //1. Get all makes that have Include =1, we'll need this to ensure when we refresh, to keep the same configuration setting
            $db      = \Config\Database::connect();
            $builder = $db->table('vehiclemakes');
            $has_data = $builder->countAll();

            if($has_data)
            {
                //get the max ID
                $max_id = $builder->selectMax('id')->get()->getResult()[0]->id;
            }

            $url = "https://vpic.nhtsa.dot.gov/api/vehicles/getallmakes?format=json";
            $json = file_get_contents($url);
            $json_data = json_decode($json, true);
            $data_count = $json_data["Count"];
            if(!$data_count)
            {
                echo "No records found";
                die;
            }
            foreach ($json_data["Results"] as $theinfo) {
                $make_id = $theinfo['Make_ID'];
                $make_name = $theinfo['Make_Name'];
                $make_data = $model->where(['make_id'=>$make_id])->first();

                //default the inclusion value & the is_new value
                $include_val = 0;
                $is_new = 1;

                //check if it exists, if it does, get the include value & set the is_new to 0 (because it exists)
                if($make_data)
                {
                    $include_val = $make_data['include'];
                    $is_new = 0;
                }

                //Load up the array
                $data = [
                    'make_id'=>$make_id,
                    'make_name'=>$make_name,
                    'include'=>$include_val,
                    'is_new'=>$is_new,
                ];
                $model->save($data);
            }
            //if there is a max_id then delete everything except the new records
            if($max_id)
            {
                $builder->where(['id <=' => $max_id]);
                $builder->delete();
            }
            echo "Vehicle Makes -> Update Complete";

        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }

    public function getmodels()
    {
        try {
            $model = new VehicleModel();
    
            //1. Get all makes that have Include =1, we'll need this to ensure when we refresh, to keep the same configuration setting
            $db      = \Config\Database::connect();
            $makebuilder = $db->table('vehiclemakes');

            //make sure we have makes
            if(!$makebuilder->countAll())
            {
                echo "No makes in the database, run that update first";
                die;
            }

            //get the make_id from the vehiclemakes table
            $makebuilder->select('make_id');
            $makebuilder->where(['include'=>1]);
            $make_ids = $makebuilder->get()->getResult();

            //delete the entire vehiclemodels table
            $db->table('vehiclemodels')->emptyTable('vehiclemodels');

            foreach ($make_ids as $make_id) {
                $url = "https://vpic.nhtsa.dot.gov/api/vehicles/GetModelsForMakeId/" . $make_id->make_id . "?format=json";
                $json = file_get_contents($url);
                $json_data = json_decode($json, true);
                $data_count = $json_data["Count"];
                //if there is data, the load up the table
                if($data_count)
                {
                    foreach ($json_data["Results"] as $theinfo) {
                        $make_id = $theinfo['Make_ID'];
                        $model_id = $theinfo['Model_ID'];
                        $model_name = $theinfo['Model_Name'];
        
                        //Load up the array
                        $data = [
                            'make_id'=>$make_id,
                            'model_name'=>$model_name,
                            'model_id'=>$model_id,
                        ];
                        $model->save($data);
                    }

                }
            }
            echo "Vehicle Models >> Update Complete";

        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }

    public function loadyears()
    {
        
    }

}