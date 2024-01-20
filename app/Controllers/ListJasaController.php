<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ListJasaModel;

class ListJasaController extends BaseController
{
    public function index()
    {
        $jasaModel = new ListJasaModel();
        $data['jasaData'] = $jasaModel->findAll();
        $data = [
            'title' => 'List-Jasa',
            'active' => 'jasa',
            'jasaData' => $data['jasaData'],
        ];
        return view('pages/admin/list-jasa/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'add-List-Jasa',
            'active' => 'jasa',
        ];
        return view('pages/admin/list-jasa/add-jasa', $data);
    }

    public function store()
    {
        $jasaModel = new ListJasaModel();
        $data = [
            'nama_jasa' => $this->request->getVar('nama_jasa'),
            'jenis_jasa' => $this->request->getVar('jenis_jasa'),
            'harga_jasa' => $this->request->getVar('harga_jasa'),
            'jumlah_foto' => $this->request->getVar('jumlah_foto'),
            'lokasi' => $this->request->getVar('lokasi'),
            'no_telepon' => $this->request->getVar('no_telepon'),
            'testimoni_foto' => $this->request->getFile('testimoni_foto'),
        ];

        if ($data['testimoni_foto']->isValid() && !$data['testimoni_foto']->hasMoved()) {
            $newName = $data['testimoni_foto']->getRandomName();
            $data['testimoni_foto']->move('./assets/upload/testi', $newName);
            $data['testimoni_foto'] = $newName;
        }

        $jasaModel->insert($data);

        session()->setFlashdata('succes', 'List jasa berhasil di tambahkan!');
        return redirect()->to(site_url('admin/list-jasa'));
    }

    public function edit($id)
    {
        $jasaModel = new ListJasaModel();
        $data['jasaData'] = $jasaModel->find($id);
        $data = [
            'title' => 'Edit-list-jasa',
            'active' => 'jasa',
            'jasaData' => $data['jasaData'],

        ];
        return view('pages/admin/list-jasa/edit-jasa', $data);
    }

    public function update($id)
    {
        $jasaModel = new ListJasaModel();

        $data = [
            'nama_jasa' => $this->request->getVar('nama_jasa'),
            'jenis_jasa' => $this->request->getVar('jenis_jasa'),
            'harga_jasa' => $this->request->getVar('harga_jasa'),
            'jumlah_foto' => $this->request->getVar('jumlah_foto'),
            'lokasi' => $this->request->getVar('lokasi'),
            'no_telepon' => $this->request->getVar('no_telepon'),
        ];

        $newFile = $this->request->getFile('testimoni_foto');

        if ($newFile->isValid() && !$newFile->hasMoved()) {
            $newName = $newFile->getRandomName();
            $newFile->move('.assets/upload/testi', $newName);
            $data['testimoni_foto'] = $newName;
        }

        $jasaModel->update($id, $data);

        session()->setFlashdata('success', 'List jasa berhasil di update!');
        return redirect()->to(site_url('admin/list-jasa'));
    }

    public function delete($id)
    {
        $jasaModel = new ListJasaModel();

        $existingRecord = $jasaModel->find($id);
        if (!$existingRecord) {
            session()->setFlashdata('error', 'Record Not Found');
            return redirect()->to(base_url('admin/list-jasa'));
        }

        $photoPath = './assets/upload/testi/' . $existingRecord['testimoni_foto'];
        if (file_exists($photoPath)) {
            unlink($photoPath);
        }

        $jasaModel->delete($id);

        session()->setFlashdata('success', 'Record delete successfully');
        return redirect()->to(base_url('admin/list-jasa'));
    }

    public function detail()
    {
        $jasaModel = new ListJasaModel();
        $jasaData = $jasaModel->findAll();

        $data = [
            'title' => 'Detail-jasa',
            'active' => 'detail',
            'jasaModel'  => $jasaData,
        ];

        return view('pages/admin/list-jasa/detail', $data);
    }
}
