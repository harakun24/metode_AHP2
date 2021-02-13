<?php

namespace App\Models;

use CodeIgniter\Model;

class jawabModel extends Model
{
    protected $table = 'pilihan';
    protected $primaryKey = 'pilihan_id';
    protected $allowedFields =
        [
        'pertanyaan',
        'jurusan',
        'pilihan',
        'nilai',
    ];
}