<?php

namespace App\Models;

use CodeIgniter\Model;

class jurusanModel extends Model
{
    protected $table = 'jurusan';
    protected $primaryKey = 'jurusan_id';
    protected $allowedFields =
        [
        'jurusan_nama',
    ];
}