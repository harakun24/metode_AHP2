<?php

namespace App\Models;

use CodeIgniter\Model;

class njModel extends Model
{
    protected $table = 'nilai_jurusan';
    protected $primaryKey = 'nilai_id';
    protected $allowedFields =
        [
        'kriteria',
        'peserta',
        'jurusan',
        'nilai',
    ];
}