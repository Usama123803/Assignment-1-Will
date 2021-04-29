<?php

namespace Modules\System\Updates\Vehicle\Models;

use CodeIgniter\Model;

class VehicleMake extends Model
{
    protected $table      = 'vehiclemakes';
    protected $primaryKey = 'id';

    // protected $useAutoIncrement = true;

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['make_id', 'make_name', 'include', 'is_new'];

    // protected $useTimestamps = true;
    protected $createdField  = 'entry_info';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'inactive_on';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;
}