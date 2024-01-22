<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PesananModel;
use App\Models\UserModel;
use App\Models\BiodataModel;
use App\Models\ListJasaModel;

class PesananController extends BaseController
{
    public function index()
    {
        $pemesananModel = new PesananModel();
        $biodataModel = new BiodataModel();
        $jasaModel = new ListJasaModel();
        $jasa = $jasaModel->findAll();
        $pesanan = $pemesananModel->findAll();
        $biodata = $biodataModel->findAll();

        $data = [
            'title' => 'Pesanan',
            'active' => 'pesanan',
            'pesanan' => $pesanan,
            'biodata' => $biodata,
            'jasa' => $jasa,
        ];

        return view('pages/admin/pesanan/index', $data);
    }
    public function edit($id)
    {
        $pemesananModel = new PesananModel();
        $userModel = new UserModel();
        $biodataModel = new BiodataModel();
        $listJasaModel = new ListJasaModel();

        $data = [
            'title' => 'Edit Pesanan',
            'active' => 'pesanan',
            'pesanan' => $pemesananModel->find($id),
            'users' => $userModel->findAll(),
            'biodatas' => $biodataModel->findAll(),
            'listJasas' => $listJasaModel->findAll(),
        ];

        return view('pages/admin/pesanan/edit-pesanan', $data);
    }


    public function update($id)
    {
        $pemesananModel = new PesananModel();

        // Ambil data dari form
        $data = [
            'user_id' => $this->request->getPost('user_id'),
            'biodata_id' => $this->request->getPost('biodata_id'),
            'jasa_id' => $this->request->getPost('jasa_id'),
            'alamat_pemesanan' => $this->request->getPost('alamat_pemesanan'),
            'tanggal_pelaksanaan' => $this->request->getPost('tanggal_pelaksanaan'),
            'no_telepon' => $this->request->getPost('no_telepon'),
        ];

        // Update data pesanan
        $pemesananModel->update($id, $data);

        return redirect()->to('admin/pesanan')->with('success', 'Pesanan berhasil diperbarui.');
    }

    public function delete($id)
    {
        $pemesananModel = new PesananModel();

        // Hapus data pesanan
        $pemesananModel->delete($id);

        return redirect()->to('admin/pesanan')->with('success', 'Pesanan berhasil dihapus.');
    }
}
