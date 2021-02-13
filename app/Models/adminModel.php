<?php

namespace App\Models;

use CodeIgniter\Model;

class adminModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'admin_id';
    protected $allowedFields =
        [
        'admin_nama',
        'admin_uname',
        'admin_pass',
    ];
}