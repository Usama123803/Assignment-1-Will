<?php

namespace Modules\System\Updates\Vehicle\Models;

use CodeIgniter\Model;

class VehicleModel extends Model
{
    protected $table      = 'vehiclemodels';
    protected $primaryKey = 'id';

    // protected $useAutoIncrement = true;

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['make_id', 'model_name', 'model_id'];

    // protected $useTimestamps = true;
    protected $createdField  = 'entry_info';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'inactive_on';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;
}