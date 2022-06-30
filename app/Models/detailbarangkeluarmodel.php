<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailBarangKeluarModel extends Model
{
    protected $table = 'tb_detail_barang';
    protected $primaryKey = "id_transaksi";
    protected $allowedFields = ['jumlah'];
}
