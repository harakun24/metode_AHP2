<?php

namespace App\Models;

use CodeIgniter\Model;

class mkriteriaModel extends Model
{
    protected $table = 'matrik_kriteria';
    protected $primaryKey = 'matrik_id';
    protected $allowedFields =
        [
        'k1',
        'k2',
        'nilai',
    ];
}