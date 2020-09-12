<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Model_kategori;

class Order extends BaseController
{
    public function index()
    {
        $pager = \Config\Services::pager();
        $db = \Config\Database::connect();
        $result = $db->query("SELECT * FROM vorder")->getResultArray();

        $total = count($result);
        $tampil = 3;

        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            $mulai = ($tampil * $page) - $tampil;
            $sql = "SELECT * FROM vorder ORDER BY status ASC LIMIT $mulai, $tampil";
        } else {
            $sql = "SELECT * FROM vorder ORDER BY status ASC LIMIT 0, $tampil";
        }
        $result = $db->query($sql)->getResultArray();
        $data = [
            "order" => $result,
            "pager" => $pager,
            "perPage" => $tampil,
            "total" => $total
        ];
        echo view("order/select", $data);
    }

    public function find($id = null)
    {
        $db = \Config\Database::connect();
        $order = $db->query("SELECT * FROM vorder WHERE idorder = $id")->getResultArray();
        $detail = $db->query("SELECT * FROM vordetail WHERE idorder = $id")->getResultArray();

        $data = [
            'order' => $order,
            'detail' => $detail
        ];
        echo view('order/update', $data);
    }

    public function update()
    {
        $idorder = $_POST['idorder'];
        $total = $_POST['total'];
        $bayar = $_POST['bayar'];

        if ($bayar < $total) {
            session()->setFlashdata('info', 'Pembayaran Kurang');
            $this->find($idorder);
        } else {
            $kembali = $bayar - $total;
            $db = \Config\Database::connect();
            $db->query("UPDATE tblorder SET bayar=$bayar, kembali=$kembali, status=1 WHERE idorder=$idorder");
            return redirect()->to(base_url() . '/admin/order');
        }
    }

    //--------------------------------------------------------------------

}
