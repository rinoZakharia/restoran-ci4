<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_pelanggan extends Model
{
    protected $table = 'tblpelanggan';

    protected $allowedFields = ['pelanggan', 'alamat', 'telp', 'email', 'password', 'aktif'];

    protected $primaryKey = 'idpelanggan';
}
