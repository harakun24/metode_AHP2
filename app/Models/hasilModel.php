<?php

namespace App\Models;

use CodeIgniter\Model;

class hasilModel extends Model
{
    protected $table = 'hasil';
    protected $primaryKey = 'hasil_id';
    protected $allowedFields =
        [
        'peserta',
        'jurusan',
        'total',
    ];
}