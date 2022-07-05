<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailBarangKeluarModel extends Model
{
    protected $table = 'tb_detail_barang';
    protected $allowedFields = ['id_transaksi', 'kode_barang', 'jumlah'];
}
