<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use App\Models\PesananModel;
use App\Models\UlasanModel;

class UlasanController extends BaseController
{
    public function index()
    {
        $ulasanModel = new UlasanModel();
        $data['ulasans'] = $ulasanModel->findAll();

        $data = [
            'title' => 'Ulasan',
            'active' => 'ulasan',
            'ulasans' => $data['ulasans']
        ];
        return view('pages/admin/ulasan/index', $data);
    }

    public function create()
    {
        // Menampilkan form tambah ulasan
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();

        $pesananModel = new PesananModel();
        $data['pesanans'] = $pesananModel->jasa();


        $data = [
            'title' => 'Add-Ulasan',
            'active' => 'add',
            'users' => $userModel->findAll(),
            'pesanans' => $pesananModel->jasa(),
        ];

        return view('pages/admin/ulasan/add-ulasan', $data);
    }

    public function store()
    {
        // Proses menyimpan ulasan baru
        $ulasanModel = new UlasanModel();

        $data = [
            'user_id' => $this->request->getPost('user_id'),
            'pesanan_id' => $this->request->getPost('pesanan_id'),
            'ulasan' => $this->request->getPost('ulasan'),
            'create_at' => date('Y-m-d H:i:s')
        ];

        $ulasanModel->insert($data);

        return redirect()->to('/ulasan')->with('success', 'Ulasan berhasil ditambahkan');
    }

    public function edit($id)
    {
        // Menampilkan form edit ulasan
        $ulasanModel = new UlasanModel();
        $data['ulasan'] = $ulasanModel->find($id);

        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();

        $pesananModel = new PesananModel();
        $data['pesanans'] = $pesananModel->findAll();

        return view('ulasan/edit', $data);
    }

    public function update($id)
    {
        // Proses update ulasan
        $ulasanModel = new UlasanModel();

        $data = [
            'user_id' => $this->request->getPost('user_id'),
            'pesanan_id' => $this->request->getPost('pesanan_id'),
            'ulasan' => $this->request->getPost('ulasan'),
            'create_at' => date('Y-m-d H:i:s')
        ];

        $ulasanModel->update($id, $data);

        return redirect()->to('/ulasan')->with('success', 'Ulasan berhasil diperbarui');
    }

    public function delete($id)
    {
        // Proses menghapus ulasan
        $ulasanModel = new UlasanModel();
        $ulasanModel->delete($id);

        return redirect()->to('/ulasan')->with('success', 'Ulasan berhasil dihapus');
    }
}
