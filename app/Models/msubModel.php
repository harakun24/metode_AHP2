<?php

namespace App\Models;

use CodeIgniter\Model;

class msubModel extends Model
{
    protected $table = 'matrik_sub';
    protected $primaryKey = 'matrik_id';
    protected $allowedFields =
        [
        'sub1',
        'sub2',
        'nilai',
    ];
}