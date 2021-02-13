<?php

namespace App\Models;

use CodeIgniter\Model;

class siswaModel extends Model
{
    protected $table = 'peserta';
    protected $primaryKey = 'peserta_id';
    protected $allowedFields =
        [
        'peserta_nama',
        'peserta_nisn',
        'peserta_jk',
        'peserta_alamat',
        'minat',
        'hasil',
    ];
}