<?php

namespace Modules\Users\Models;

use CodeIgniter\Model;

class ActivationModel extends Model
{
    protected $table      = 'persons';
    protected $primaryKey = 'id';

    // protected $useAutoIncrement = true;

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['activated_on'];

    // protected $useTimestamps = true;
    protected $createdField  = 'activated_on';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'inactive_on';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;
}