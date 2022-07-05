<?php

namespace App\Controllers;;

use App\Models\DetailBarangKeluarModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;


class detailbarangkeluar extends ResourceController
{
    use ResponseTrait;
    public function index()
    {
        $model = new DetailBarangKeluarModel();
        $data['detailbarangkeluar'] = $model->orderBy('id_transaksi', 'DESC')->findAll();
        return $this->respond($data);
    }

    // membuat data barang keluar
    public function create()
    {
        $model = new DetailBarangKeluarModel();
        $data = [
            'id_transaksi' => $this->request->getPost('id_transaksi'),
            'kode_barang' => $this->request->getPost('kodebarang'),
            'jumlah' => $this->request->getVar('jumlah'),

        ];
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
        $this->barangkeluar->update($id_transaksi, [
            'kode_barang' => $this->request->getPost('kodebarang'),
            'jumlah' => $this->request->getPost('jumlah'),


        ]);

        return redirect('BarangkeluarModel')->with('success', 'Data Updated Successfully');
    }

    // delete Detail barang keluar
    public function delete($id_transaksi = null)
    {

        $model = new DetailBarangKeluarModel();
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
