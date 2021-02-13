<?php

namespace App\Models;

use CodeIgniter\Model;

class nsubModel extends Model
{
    protected $table = 'nilai_un';
    protected $primaryKey = 'nilai_id';
    protected $allowedFields =
        [
        'sub',
        'peserta',
        'nilai',
    ];
}