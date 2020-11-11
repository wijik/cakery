<?php

namespace App\Controllers;

class Komentar extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->validation = \Config\Services::validation();
        $this->session = session();
        $this->komentarModel = new \App\Models\KomentarModel();
        $this->kmnArtikel = new \App\Models\KomentarArtikelModel();
        $this->blogModel = new \App\Models\BlogModel();
        $this->bahanModel = new \App\Models\BahanModel();
    }

    public function create($id)
    {
        $id_user = $this->session->get('id');
        $id_barang = $id;
        $komentar = $this->request->getPost('komentar');
        $created_by = $this->session->get('id');
        // $created_date = date("Y-m-d H:i:s");

        $data = [
            'id_user' => $id_user,
            'id_barang' => $id_barang,
            'komentar' => $komentar,
            'created_by' => $created_by,
            // 'created_date' => $created_date,
        ];
        $simpan = $this->komentarModel->insert_komentar($data);

        if ($simpan) {
            session()->setFlashdata('pesan', 'Komentar berhasil di tambahkan');
            return redirect()->to(base_url('/barang/view/' . $id_barang));
        }
    }
    public function komen($id)
    {
        $getId = $this->blogModel->find($id);
        $slug = $getId['slug'];
        $id_user = $this->session->get('id');
        $id_blog = $id;
        $komentar = $this->request->getPost('komentar');
        $created_by = $this->session->get('id');

        $data = [
            'id_user' => $id_user,
            'id_blog' => $id_blog,
            'komentar' => $komentar,
            'created_date' => date("Y-m-d H:i:s"),
        ];
        $simpan = $this->kmnArtikel->insert_komentar($data);
        if ($simpan) {
            session()->setFlashdata('pesan', 'Komentar berhasil di tambahkan');
            return redirect()->to(base_url('artikel/' . $slug));
        }
    }
    public function delete($id)
    {
        $id_blog = $this->request->getVar('blog');
        $getBlog = $this->blogModel->find($id_blog);
        $slug = $getBlog['slug'];
        $this->kmnArtikel->delete($id);
        session()->setFlashdata('pesan', 'Komentar Berhasil di hapus');
        return redirect()->to('/artikel/' . $slug);
    }
    public function deleteKmn($id)
    {
        $barang = $this->request->getVar('barang');
        $getBarang = $this->bahanModel->find($barang);
        $id_barang = $getBarang['id'];

        $this->komentarModel->delete($id);
        session()->setFlashdata('pesan', 'Komentar Berhasil di hapus');
        return redirect()->to('/barang/view/' . $id_barang);
    }
}
