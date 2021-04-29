<?php

namespace Modules\Vehicle\Models;

use CodeIgniter\Model;

class GarageModel extends Model
{
    protected $table      = 'personsgarage';
    protected $primaryKey = 'id';

    // protected $useAutoIncrement = true;

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['make', 'model', 'notes', 'year','persons_id', 'inactive'];

    // protected $useTimestamps = true;
    protected $createdField  = 'entry_info';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'inactive_on';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;
}