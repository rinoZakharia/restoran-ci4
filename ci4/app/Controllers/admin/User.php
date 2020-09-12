<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Model_user;

class User extends BaseController
{
    public function index()
    {
        $pager = \Config\Services::pager();
        $model = new Model_user();
        $data = [
            'user' => $model->paginate(3, 'group1'),
            'pager' => $model->pager
        ];

        return view("user/select", $data);
    }

    public function create()
    {
        $data = ['level' => ['Admin', 'Koki', 'Kasir']];
        return view("user/insert", $data);
    }

    public function insert()
    {
        $model = new Model_user();
        $data = [
            'user' => $_POST['user'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'level' => $_POST['level'],
            'aktif_user' => 1
        ];
        if ($model->insert($data) === false) {
            $error = $model->errors();
            session()->setFlashdata('info', $error);
            return redirect()->to(base_url() . '/admin/user/create');
        } else {
            return redirect()->to(base_url() . '/admin/user');
        }
    }

    public function delete($id = null)
    {
        $model = new Model_user();
        $model->delete($id);

        return redirect()->to(base_url() . '/admin/user');
    }

    public function update($id = null, $isi = 1)
    {
        $model = new Model_user();
        if ($isi == 0) {
            $isi = 1;
        } else {
            $isi = 0;
        }

        $data = ["aktif_user" => $isi];
        $model->update($id, $data);
        return redirect()->to(base_url() . '/admin/user');
    }

    public function find($id = null)
    {
        $model = new Model_user();
        $user = $model->find($id);
        $data = ['user' => $user, 'level' => ['Admin', 'Koki', 'Kasir']];

        return view("user/update", $data);
    }

    public function ubah()
    {
        $model = new Model_user();
        $id = $_POST['iduser'];
        $data = [
            'email' => $_POST['email'],
            'level' => $_POST['level']
        ];
        if ($model->update($id, $data) === false) {
            $error = $model->errors();
            session()->setFlashdata('info', $error);
            return redirect()->to(base_url("/admin/user/find/$id"));
        } else {
            return redirect()->to(base_url("/admin/user"));
        }
    }


    //--------------------------------------------------------------------

}
