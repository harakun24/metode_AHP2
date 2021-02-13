<?php

namespace App\Models;

use CodeIgniter\Model;

class mjurusanModel extends Model
{
    protected $table = 'matrik_jurusan';
    protected $primaryKey = 'matrik_id';
    protected $allowedFields =
        [
        'sub',
        'jurusan1',
        'jurusan2',
        'nilai',
    ];
}