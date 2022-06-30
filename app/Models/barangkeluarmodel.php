<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangKeluarModel extends Model
{
    protected $table = "tb_barang_keluar";
    protected $primaryKey = "id_transaksi";
    protected $allowedFields = ['tanggal', 'lokasi'];
}
