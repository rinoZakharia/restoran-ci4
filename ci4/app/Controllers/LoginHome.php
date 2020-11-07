<?php

namespace App\Controllers;

use App\Models\Model_pelanggan;

class LoginHome extends BaseController
{
    public function index()
    {
        $data = [];
        if ($this->request->getMethod() == 'post') {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $model = new Model_pelanggan();
            $pelanggan = $model->where(['email' => $email, 'aktif' => 1])->first();
            if (empty($pelanggan)) {
                $data['info'] = "Email salah";
            } else {
                if (password_verify($password, $pelanggan['password'])) {
                    $this->setSession($pelanggan);
                    return redirect()->to(base_url());
                } else {
                    $data['info'] = "Email salah";
                }
            }
        }

        return view("loginhome", $data);
    }

    public function setSession($pelanggan)
    {
        $dataP = [
            'idpelanggan' => $pelanggan['idpelanggan'],
            'pelanggan' => $pelanggan['pelanggan'],
            'emailP' => $pelanggan['email'],
            'loggedInP' => true
        ];

        session()->set($dataP);
    }

    public function logout()
    {
        session()->remove(['idpelanggan', 'pelanggan', 'emailP', 'loggedInP']);
        return redirect()->to(base_url());
    }

    public function daftar()
    {
        $data = [];
        if ($this->request->getMethod() == 'post') {
            $db      = \Config\Database::connect();
            $builder = $db->table('tblpelanggan');

            $data = [
                'pelanggan' => $this->request->getPost('pelanggan'),
                'alamat' => $this->request->getPost('alamat'),
                'telp' => $this->request->getPost('telp'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'aktif' => 1
            ];
            if ($this->request->getPost('password') != $this->request->getPost('konfirmasi')) {
                $data['info'] = "Password tidak sama!!";
            } else {
                $builder->insert($data);
                return redirect()->to(base_url("loginhome"));
            }
        }
        return view("daftar", $data);
    }

    //--------------------------------------------------------------------

}
