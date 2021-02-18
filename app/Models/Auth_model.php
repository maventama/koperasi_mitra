<?php

namespace App\Models;

use CodeIgniter\Model;

class Auth_model extends Model
{
    protected $table      = 'anggota';
    protected $primaryKey = 'id_anggota';

    protected $returnType     = 'array';
}
