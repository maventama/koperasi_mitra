<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatAngsuran_model extends Model
{
    protected $table      = 'riwayat_angsuran';
    protected $primaryKey = 'id_riwayat_angsuran';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['angsuran_id', 'nominal_angsuran', 'created_by'];
}
