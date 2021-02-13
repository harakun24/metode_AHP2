<?php

namespace App\Models;

use CodeIgniter\Model;

class kriteriaModel extends Model
{
    protected $table = 'kriteria';
    protected $primaryKey = 'kriteria_id';
    protected $allowedFields =
        [
        'kriteria_nama',
    ];
}