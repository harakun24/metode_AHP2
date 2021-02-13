<?php

namespace App\Models;

use CodeIgniter\Model;

class subModel extends Model
{
    protected $table = 'subkriteria';
    protected $primaryKey = 'sub_id';
    protected $allowedFields =
        [
        'kriteria_id',
        'sub_nama',
    ];
}