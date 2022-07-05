<?php

namespace App\Controllers;

use App\Models\BarangKeluarModel;
use App\Models\DetailBarangKeluarModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class barangkeluar extends ResourceController
{
    use ResponseTrait;
    // all users
    public function index()
    {
        $model = new BarangKeluarModel();
        $data['id_transaksi'] = $model->orderBy('id_transaksi', 'DESC')->findAll();
        return $this->respond($data);
    }
    // membuat data barang keluar
    public function create()
    {
        $model = new BarangKeluarModel();

        $data = [
            'id_transaksi' => $this->request->getPost('id_transaksi'),
            'kode_barang' => $this->request->getPost('kode_barang'),
            'tanggal' => $this->request->getPost('tanggal'),
            'lokasi'  => $this->request->getPost('lokasi'),
            'jumlah'  => $this->request->getPost('jumlah'),

        ];;
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data produk berhasil ditambahkan.'
            ]
        ];
        return $this->respondCreated($response);
    }

    // update barang keluar
    public function update($id_transaksi = null)
    {
        $model = new BarangKeluarModel();

        $this->barangkeluar->update($id_transaksi, [
            'kode_barang' => $this->request->getPost('kode_barang'),
            'tanggal' => $this->request->getPost('tanggal'),
            'lokasi' => $this->request->getPost('lokasi')

        ]);

        return redirect('BarangkeluarModel')->with('success', 'Data Updated Successfully');
    }

    // delete barang keluar
    public function delete($id_transaksi = null)
    {

        $model = new BarangKeluarModel();
        $data = $model->delete($id_transaksi);
        if ($data) {
            $model->delete($id_transaksi);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data produk berhasil dihapus.'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }
}
