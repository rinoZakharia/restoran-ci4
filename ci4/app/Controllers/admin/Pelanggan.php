<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Model_pelanggan;

class Pelanggan extends BaseController
{
    public function index()
    {
        $pager = \Config\Services::pager();
        $model = new Model_pelanggan();
        $data = [
            'pelanggan' => $model->paginate(3, 'group1'),
            'pager' => $model->pager
        ];
        echo view("pelanggan/select", $data);
    }

    public function delete($id = null)
    {
        $model = new Model_pelanggan();
        $model->delete($id);

        return redirect()->to(base_url() . '/admin/pelanggan');
    }

    public function update($id = null, $isi = 1)
    {
        $model = new Model_pelanggan();
        if ($isi == 0) {
            $isi = 1;
        } else {
            $isi = 0;
        }

        $data = ["aktif" => $isi];
        $model->update($id, $data);
        return redirect()->to(base_url() . '/admin/pelanggan');
    }

    //--------------------------------------------------------------------

}
