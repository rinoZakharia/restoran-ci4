<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Model_kategori;
use App\Models\Model_menu;

class Menu extends BaseController
{
    public function index()
    {
        $pager = \Config\Services::pager();
        $model = new Model_menu();
        $data = [
            'menu' => $model->paginate(3, 'group1'),
            'pager' => $model->pager
        ];
        return view('menu/select', $data);
    }

    public function read()
    {
        $pager = \Config\Services::pager();
        if (isset($_GET['idkategori'])) {
            $id = $_GET['idkategori'];

            $tampil = 3;
            $mulai = 0;
            $model = new Model_menu();
            $jumlah = $model->where('idkategori', $id)->findAll();
            $count = count($jumlah);
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                $mulai = ($tampil * $page) - $tampil;
            }
            $menu = $model->where('idkategori', $id)->findAll($tampil, $mulai);

            $data = [
                'menu' => $menu,
                'pager' => $pager,
                'tampil' => $tampil,
                'total' => $count
            ];
            return view('menu/cari', $data);
        }
    }

    public function create()
    {
        $model = new Model_kategori();
        $kategori = $model->findAll();
        $data = ['kategori' => $kategori];
        return view("menu/insert", $data);
    }

    public function insert()
    {
        $request = \Config\Services::request();
        $file = $request->getFile('gambar');
        $name = $file->getName();
        $model = new Model_menu();

        $data = [
            'idkategori' => $request->getPost('idkategori'),
            'menu' => $request->getPost('menu'),
            'gambar' => $name,
            'harga' => $request->getPost('harga')
        ];

        $model->insert($data);
        $file->move('./upload');
        return redirect()->to(base_url() . '/admin/menu');
        if ($model->insert($_POST) === false) {
            $error = $model->errors();
            session()->setFlashdata('info', $error);
            return redirect()->to(base_url() . '/admin/menu/create');
        } else {
            return redirect()->to(base_url() . '/admin/menu');
        }
    }

    public function find($id = null)
    {
        $model = new Model_kategori();
        $kategori = $model->findAll();

        $model = new Model_menu();
        $menu = $model->find($id);
        $data = [
            'menu' => $menu,
            'kategori' => $kategori
        ];

        return view("menu/update", $data);
    }

    public function update()
    {
        $id = $this->request->getPost('idmenu');
        $file = $this->request->getFile('gambar');
        $name = $file->getName();
        $model = new Model_menu();

        if (empty($name)) {
            $name = $this->request->getPost('gambar');
        } else {
            $file->move('./upload');
        }

        $data = [
            'idkategori' => $this->request->getPost('idkategori'),
            'menu' => $this->request->getPost('menu'),
            'gambar' => $name,
            'harga' => $this->request->getPost('harga'),
        ];

        if ($model->update($id, $data) === false) {
            $error = $model->errors();
            session()->setFlashdata('info', $error);
            return redirect()->to(base_url("/admin/menu/find/$id"));
        } else {
            return redirect()->to(base_url() . '/admin/menu');
        }
    }

    public function option()
    {
        $model = new Model_kategori();
        $kategori = $model->findAll();
        $data = ['kategori' => $kategori];
        return view('template/option', $data);
    }

    public function delete($id = null)
    {
        $model = new Model_menu();
        $model->delete($id);

        return redirect()->to(base_url() . '/admin/menu');
    }

    //--------------------------------------------------------------------

}
