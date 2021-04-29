<?php

namespace Modules\Users\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table      = 'persons';
    protected $primaryKey = 'id';

    // protected $useAutoIncrement = true;

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['first_name', 'last_name', 'email', 'password','phone', 'reg_key'];

    // protected $useTimestamps = true;
    protected $createdField  = 'created_on';
    // protected $updatedField  = 'updated_at';
    protected $deletedField  = 'inactive_on';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;
}