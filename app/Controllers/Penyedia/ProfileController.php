<?php

namespace App\Controllers\Penyedia;

use App\Controllers\BaseController;
use App\Models\BiodataModel;
use CodeIgniter\HTTP\ResponseInterface;

class ProfileController extends BaseController
{
    protected $authentication;

    public function __construct()
    {
        $this->authentication = \Config\Services::authentication();
    }

    public function index()
    {
        $biodataModel = new BiodataModel();

        // Mengambil data biodata, email, dan status pengguna berdasarkan session('user_id_biodata')
        $biodata = $biodataModel->getBiodataWithUser(session('user_id_biodata'));

        $data = [
            'biodata' => $biodata,
            'title'   => 'Profil',
            'active'  => 'profile',
        ];

        return view('pages/penyedia/profile/index', $data);
    }

    public function create()
    {
        $data = [
            'title'   => 'Tambah Profil',
            'active'  => 'profile',
        ];

        return view('pages/penyedia/profile/add-profile', $data);
    }

    public function store()
    {
        $biodataModel = new BiodataModel();

        $data = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'user_id' => $this->request->getPost('user_id'),
            'no_telepon'        => $this->request->getPost('no_telepon'),
            'tanggal_lahir'          => $this->request->getPost('tanggal_lahir'),
            'alamat'          => $this->request->getPost('alamat'),
            'nomor_ktp'          => $this->request->getPost('nomor_ktp'),
            'foto_ktp'           => $this->request->getFile('foto_ktp'),
        ];

        if ($data['foto_ktp']->isValid() && !$data['foto_ktp']->hasMoved()) {
            $newName = $data['foto_ktp']->getRandomName();
            $data['foto_ktp']->move('./assets/upload/ktp', $newName);
            $data['foto_ktp'] = $newName;
        }

        $biodataModel->insert($data);
        session()->set('user_id_biodata', $this->request->getPost('user_id'));

        session()->setFlashdata('success', 'Biodata berhasil ditambahkan!.');
        return redirect()->to(site_url('/penyedia/profile'));
    }

    public function edit($id)
    {
        $biodataModel = new BiodataModel();

        $item = $biodataModel->getBiodataWithUser($id);

        $data = [
            'item' => $item,
            'title' => 'Edit Profil',
            'active' => 'profile',
        ];

        return view('pages/penyedia/profile/edit-profile', $data);
    }

    public function update($id)
    {
        $biodataModel = new BiodataModel();

        $data = [
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'no_telepon'   => $this->request->getVar('no_telepon'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'alamat'        => $this->request->getVar('alamat'),
            'nomor_ktp'     => $this->request->getVar('nomor_ktp'),
        ];

        $newFile = $this->request->getFile('foto_ktp');

        if ($newFile->isValid() && !$newFile->hasMoved()) {
            $newName = $newFile->getRandomName();
            $newFile->move('./assets/upload/ktp', $newName);
            $data['foto_ktp'] = $newName;
        }

        $biodataModel->update($id, $data);

        session()->setFlashdata('success', 'Biodata berhasil diupdate!');
        return redirect()->to(site_url('penyedia/profile'));
    }
}
