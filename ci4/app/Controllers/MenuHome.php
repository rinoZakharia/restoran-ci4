<?php

namespace App\Controllers;

use App\Models\Model_kategori;
use App\Models\Model_menu;
use App\Models\Model_orderdetail;

class MenuHome extends BaseController
{
    public function index($id = null)
    {
        if (empty($id)) {
            $model = new Model_menu();
            $menu = $model->orderBy("idkategori", 'ASC')->findAll();
        } else {
            $model = new Model_menu();
            $menu = $model->where('idkategori', $id)->findAll();
        }
        $model = new Model_kategori();
        $kategori = $model->findAll();
        $data = ["menu" => $menu, "kategori" => $kategori];
        return view('menu', $data);
    }

    public function keranjang()
    {
        return view('cart');
    }

    public function insert()
    {
        $db      = \Config\Database::connect();
        $order = $db->table('tblorder');
        $ordetail = $db->table('tblordetail');
        $array = json_decode(file_get_contents("php://input"), true);
        $total = null;
        foreach ($array as $key => $value) {
            $total += $value["total"];
        }

        $data = [
            'idpelanggan' => session()->get('idpelanggan'),
            'tglorder' => date('yy-m-d'),
            'total' => $total,
            'bayar' => 0,
            'kembali' => 0,
            'status' => 0
        ];
        $order->insert($data);
        $idorder = $order->orderBy('idorder', 'DESC')->get()->getRowArray(0);
        foreach ($array as $key => $value) {
            $data2 = [
                'idorder' => $idorder["idorder"],
                'idmenu' => $value["id"],
                'jumlah' => $value["quantity"],
                'hargajual' => $value["harga"]
            ];
            $ordetail->insert($data2);
        }
    }

    public function histori()
    {
        $db      = \Config\Database::connect();
        $order = $db->table('tblorder');
        $model = new Model_orderdetail();
        $detail = $model->where('idpelanggan', session()->get('idpelanggan'))->orderBy("idorder", 'ASC')->findAll();
        $data = ["detail" => $detail, "order" => $order->where('idpelanggan', session()->get('idpelanggan'))->get()->getResultArray()];
        return view('histori', $data);
    }

    //--------------------------------------------------------------------

}
