<?php

namespace App\Models;

use CodeIgniter\Model;

class tanyaModel extends Model
{
    protected $table = 'pertanyaan';
    protected $primaryKey = 'pertanyaan_id';
    protected $allowedFields =
        [
        'pertanyaan',
    ];
}