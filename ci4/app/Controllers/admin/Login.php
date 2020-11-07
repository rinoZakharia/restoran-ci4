<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Model_user;

class Login extends BaseController
{
    public function index()
    {
        $data = [];
        if ($this->request->getMethod() == 'post') {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $model = new Model_user();
            $user = $model->where(['email' => $email, 'aktif_user' => 1])->first();
            if (empty($user)) {
                $data['info'] = "Email salah";
            } else {
                if (password_verify($password, $user['password'])) {
                    $this->setSession($user);
                    return redirect()->to(base_url("/admin"));
                } else {
                    $data['info'] = "Email salah";
                }
            }
        }

        return view('template/login', $data);
    }

    public function setSession($user)
    {
        $data = [
            'user' => $user['user'],
            'email' => $user['email'],
            'level' => $user['level'],
            'loggedIn' => true
        ];

        session()->set($data);
    }

    public function logout()
    {
        session()->remove(['user', 'email', 'level', 'loggedIn']);
        return redirect()->to(base_url("/login"));
    }


    //--------------------------------------------------------------------

}
