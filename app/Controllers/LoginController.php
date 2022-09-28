<?php

namespace App\Controllers;

use App\Models\Users;

class LoginController extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->loginmodel = new Users();
    }



    public function index()
    {
        echo view('/login');
    }

    public function cek_login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $cek = $this->loginmodel->cek_login($username, $password);


        if (($cek['username'] == $username) && ($cek['password'] == $password)) {
            // pengecekan jika username dan password benar 
            session()->set('nama_user', $cek['nama_user']);
            session()->set('username', $cek['username']);
            session()->set('level', $cek['level']);
            return redirect()->to(base_url('/index'));
        } else {
            // jika pengecekan salah 
            session()->setFlashData('gagal', 'Username atau password tidak benar');
            return redirect()->to(base_url('/login'));
        }
    }

    public function logout()
    {
        session()->remove('nama_user');
        session()->remove('username');
        session()->remove('level');
        session()->setFlashData('sukses', 'Anda Berhasil Logout');
        return redirect()->to(base_url('/login'));
    }
}
