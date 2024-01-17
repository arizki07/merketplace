<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\BiodataModel;
use App\Models\UserModel;

class BiodataController extends BaseController
{
    public function pengguna()
    {
        $biodataModel = new BiodataModel();
        $data['biodata'] = $biodataModel->findAll();
        $data['title'] = 'Pengguna Jasa';
        $data['active'] = 'pengguna';

        return view('pages/admin/biodata/pengguna', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add-Pengguna',
            'active' => 'pengguna',
        ];
        return view('pages/admin/biodata/crud/add-pengguna', $data);
    }

    public function create()
    {
        $biodataModel = new BiodataModel();
        $data = [
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'no_telepon'        => $this->request->getVar('no_telepon'),
            'tanggal_lahir'          => $this->request->getVar('tanggal_lahir'),
            'alamat'          => $this->request->getVar('alamat'),
            'nomor_ktp'          => $this->request->getVar('nomor_ktp'),
            'foto_ktp'           => $this->request->getFile('foto_ktp'),
        ];

        if ($data['foto_ktp']->isValid() && !$data['foto_ktp']->hasMoved()) {
            $newName = $data['foto_ktp']->getRandomName();
            $data['foto_ktp']->move('./assets/upload/ktp', $newName);
            $data['foto_ktp'] = $newName;
        }

        $biodataModel->insert($data);

        session()->setFlashdata('success', 'Biodata berhasil ditambahkan!');
        return redirect()->to(site_url('admin/pengguna-jasa'));
    }

    public function edit($id)
    {
        $biodataModel = new BiodataModel();
        $data['item'] = $biodataModel->find($id);

        $data['title'] = 'edit Pengguna Jasa';
        $data['active'] = 'pengguna';
        return view('pages/admin/biodata/crud/edit-pengguna', $data);
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
        return redirect()->to(site_url('admin/pengguna-jasa'));
    }

    public function delete($id)
    {
        $biodataModel = new BiodataModel();

        $existingRecord = $biodataModel->find($id);
        if (!$existingRecord) {
            session()->setFlashdata('error', 'Record not found.');
            return redirect()->to(base_url('admin/pengguna-jasa'));
        }

        $photoPath = './assets/upload/ktp/' . $existingRecord['foto_ktp'];
        if (file_exists($photoPath)) {
            unlink($photoPath);
        }

        $biodataModel->delete($id);

        session()->setFlashdata('success', 'Record deleted successfully.');
        return redirect()->to(base_url('admin/pengguna-jasa'));
    }




    //Penyedia

    public function penyedia()
    {
        $data = [
            'title' => 'Penyedia Jasa',
            'active' => 'penyedia',
        ];
        return view('pages/admin/biodata/penyedia', $data);
    }
}
