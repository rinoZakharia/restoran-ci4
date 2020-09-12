<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Model_orderdetail;

class Ordetail extends BaseController
{
    public function index()
    {
        $pager = \Config\Services::pager();
        $model = new Model_orderdetail();
        $data = [
            'detail' => $model->paginate(3, 'group1'),
            'pager' => $model->pager
        ];

        return view("detail/select", $data);
    }

    public function cari()
    {
        $awal = $_POST['awal'];
        $sampai = $_POST['sampai'];

        $sql = "SELECT * FROM vordetail WHERE tglorder BETWEEN '$awal' AND '$sampai' ";
        $db = \Config\Database::connect();
        $result = $db->query($sql)->getResultArray();

        $data = [
            'detail' => $result
        ];
        return view("detail/cari", $data);
    }

    //--------------------------------------------------------------------

}
