<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Model_kategori;

class Kategori extends BaseController
{
    public function index()
    {
        $pager = \Config\Services::pager();
        $model = new Model_kategori();
        $data = [
            'kategori' => $model->paginate(3, 'group1'),
            'pager' => $model->pager
        ];

        return view("kategori/select", $data);
    }

    public function create()
    {
        return view("kategori/insert");
    }

    public function insert()
    {
        $model = new Model_kategori();
        if ($model->insert($_POST) === false) {
            $error = $model->errors();
            session()->setFlashdata('info', $error['kategori']);
            return redirect()->to(base_url() . '/admin/kategori/create');
        } else {
            return redirect()->to(base_url() . '/admin/kategori');
        }
    }

    public function find($id = null)
    {
        $model = new Model_kategori();
        $kategori = $model->find($id);
        $data = ['kategori' => $kategori];

        return view("kategori/update", $data);
    }

    public function update()
    {
        $model = new Model_kategori();
        $id = $_POST['idkategori'];
        if ($model->save($_POST) === false) {
            $error = $model->errors();
            session()->setFlashdata('info', $error['kategori']);
            return redirect()->to(base_url("/admin/kategori/find/$id"));
        } else {
            return redirect()->to(base_url("/admin/kategori"));
        }
    }

    public function delete($id = null)
    {
        $model = new Model_kategori();
        $model->delete($id);

        return redirect()->to(base_url() . '/admin/kategori');
    }

    //--------------------------------------------------------------------

}
