<?php 
namespace Modules\Users\Controllers;
use App\Controllers\BaseController;
use Modules\Users\Controllers\Index;

class Activation extends BaseController
{
    public function activate($the_key = null)
    {

        try
        {
            //If there is no activation key, then send it home
            if(!$the_key)
            {
                return redirect()->to('/');
            }

            //let's confirm the registration key and get the ID # to update
            $db      = \Config\Database::connect();
            $builder = $db->table('persons');
            $builder->select('id');

            $results = $builder->getWhere(['reg_key' => $the_key, 'activated_on' => null])->getResult();
     
            //if there is no ID, then 
            if(!$results){
                return redirect()->to('/');
                // echo "No ID Found";
            }else{
                $the_id = $results[0]->id;
                helper('date');
                $data = ['activated_on' =>date("Y-m-d H:i:s", now())];
                $builder->where('id',$the_id);
                $result = $builder->update($data);
                session()->setFlashdata('success','Activation complete, please log in.');
                return redirect()->to('/user_login');
            }

        }
        catch(\Exception $e)
        {
            return redirect()->to('/');
        }
    }
}
