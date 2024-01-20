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

        // Ambil semua data pesanan
        $pesanan = $pemesananModel->findAll();

        $data = [
            'title' => 'Pesanan',
            'active' => 'pesanan',
            'pesanan' => $pesanan,
        ];

        return view('pages/admin/pesanan/index', $data);
    }

    public function create()
    {
        $userModel = new UserModel();
        $biodataModel = new BiodataModel();
        $listJasaModel = new ListJasaModel();

        $data = [
            'title' => 'Tambah Pesanan',
            'active' => 'pesanan',
            'users' => $userModel->findAll(),
            'biodatas' => $biodataModel->findAll(),
            'listJasas' => $listJasaModel->findAll(),
        ];

        return view('pages/admin/pesanan/create', $data);
    }

    public function store()
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

        // Simpan data pesanan
        $pemesananModel->insert($data);

        return redirect()->to('/pesanan')->with('success', 'Pesanan berhasil ditambahkan.');
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

        return view('pages/admin/pesanan/edit', $data);
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

        return redirect()->to('/pesanan')->with('success', 'Pesanan berhasil diperbarui.');
    }

    public function delete($id)
    {
        $pemesananModel = new PesananModel();

        // Hapus data pesanan
        $pemesananModel->delete($id);

        return redirect()->to('/pesanan')->with('success', 'Pesanan berhasil dihapus.');
    }
}
