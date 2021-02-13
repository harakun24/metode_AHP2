<?php namespace App\Controllers;

use App\Models\adminModel;

class Admin extends BaseController
{
    public static $session;
    public function __construct()
    {
        self::$session = session();
        $this->admin = new \App\Models\adminModel();
        $this->siswa = new \App\Models\siswaModel();
    }
    public function isLogged()
    {
        return self::$session->get('logged');
    }
    public function logout()
    {
        self::$session->set('logged', false);
        return redirect()->to('/admin');
    }
    public function index()
    {
        if ($this->isLogged()) {
            return redirect()->to("/ahp");
        } else {
            return view("login");
        }

    }
    public function prosesLogin()
    {
        $data = ['admin_uname' => $this->request->getVar('uname'), 'admin_pass' => $this->request->getVar('pass')];
        $admin = $this->admin->where($data)->first();
        if ($admin != null) {
            self::$session->set('logged', true);
            self::$session->set('tipe', 'admin');
            self::$session->set('user', $admin['admin_nama']);
        } else {
            $data = ['peserta_id' => $this->request->getVar('uname'), 'peserta_nisn' => $this->request->getVar('pass')];
            $siswa = $this->siswa->where($data)->first();
            if ($siswa != null) {
                self::$session->set('logged', true);
                self::$session->set('tipe', 'user');
                self::$session->set('user', $siswa['peserta_nama']);
                self::$session->set('userid', $siswa['peserta_id']);
            }
        }
        return redirect()->to('/');
        // dd($this->isLogged());
    }

    //--------------------------------------------------------------------

}