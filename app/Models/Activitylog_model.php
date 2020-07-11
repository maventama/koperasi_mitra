<?php

namespace App\Models;

use CodeIgniter\Model;

class Activitylog_model extends Model
{
    protected $table      = 'activitylog';
    protected $primaryKey = 'id_activity_log';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['description', 'date', 'userid'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
