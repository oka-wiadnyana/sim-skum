<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Services;
use CodeIgniter\I18n\Time;
use Config\Validation;
use Ngekoding\CodeIgniterDataTables\DataTables;


class Auth extends BaseController
{
    public function __construct()
    {
        $this->validation = Services::validation();
        helper('asset_helper');
        $this->assets_script = assets();
    }

    public function index()
    {
        if (session()->get('login') == true) {
            return redirect()->to(base_url('radius/data_radius'));
        }
        date_default_timezone_set('Asia/Makassar');
        $time = date('H');
        // dd($time);

        if ($time > 6 & $time <= 11) {
            $greet = 'Selamat Pagi';
        } elseif ($time > 11 & $time <= 15) {
            $greet = 'Selamat Siang';
        } elseif ($time > 15 & $time <= 19) {
            $greet = 'Selamat Sore';
        } else {
            $greet = 'Selamat Malam';
        }
        $data = [
            'assets' => $this->assets_script,
            'greet' => $greet

        ];

        return view('login', $data);
    }

    public function daftar_akun()
    {
        $data = [
            'title' => 'Daftar Akun',
            'assets' => assets(),

        ];
        return view('v_daftar_akun', $data);
    }

    public function modal_akun()
    {
        return $this->response->setJSON([view('modal_akun')]);
    }

    public function attempt_register()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi'
                ]
            ],
            'email' => [
                'rules' => 'required|is_unique[auth.email]',
                'errors' => [
                    'required' => 'Email harus diisi',
                    'is_unique' => 'Email sudah ada'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi'
                ]
            ],
            'password2' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Konfirmasi Password tidak sama'
                ]
            ]
        ])) {

            session()->setFlashdata('validasi', $this->validation->getErrors());
            return redirect()->to(base_url('auth/daftar_akun'));
        }

        $nama = $this->request->getVar('nama');
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $data = [
            'nama' => $nama,
            'email' => $email,
            'password' => $password_hash
        ];
        $db = db_connect();
        if ($db->table('auth')->insert($data)) {
            session()->setFlashdata('success', 'Akun berhasil diinput');
            return redirect()->to(base_url('auth/daftar_akun'));
        } else {
            session()->setFlashdata('validasi', ['Akun gagal diinput']);
            return redirect()->to(base_url('auth/daftar_akun'));
        }
    }



    public function datatable_akun()
    {
        $db = db_connect();
        $queryBuilder = $db->table('auth')->orderBy('id', 'desc');

        $datatables = new DataTables($queryBuilder, '4');
        $datatables->addSequenceNumber();
        $datatables->only(['nama', 'email']);


        $datatables->addColumn('action', function ($row) {

            return '<a href="" class="btn btn-danger delete_btn " data-id="' . $row->id . '" data-nama="' . $row->nama . '" style="border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash"></i></a>
           
            ';
        });



        $datatables->generate(); // done
    }

    public function attempt_login()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $db = db_connect();
        $data_user = $db->table('auth')->where('email', $email)->get()->getResultArray();

        if (count($data_user) == 1) {
            if (password_verify($password, $data_user[0]['password'])) {
                session()->set('id_user', $data_user[0]['id']);
                session()->set('nama_user', $data_user[0]['nama']);
                session()->set('login', true);
                session()->setFlashdata('success', 'Selamat datang ' . $data_user[0]['nama']);

                return redirect()->to(base_url('radius/data_radius'));
            } else {
                session()->setFlashdata('fail', ['Password salah!']);
                return redirect()->to(base_url('auth'));
            }
        } else {
            session()->setFlashdata('fail', ['Email tidak terdaftar!']);
            return redirect()->to(base_url('auth'));
        }
    }



    public function ubah_password_user()
    {
        if (!$this->validate([
            'password_lama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password lama harus diisi'
                ],
            ],
            'password_baru' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password baru harus diisi'
                ],
            ],
            'password_baru2' => [
                'rules' => 'required|matches[password_baru]',
                'errors' => [
                    'required' => 'Konfirmasi password harus diisi',
                    'matches' => 'Konfirmasi password tidak sama'
                ],
            ],

        ])) {
            session()->setFlashdata('validasi', $this->validation->getErrors());
            return redirect()->to(base_url('userdashboard'));
        }

        $user = session()->get('id_user');
        $password_lama = $this->request->getVar('password_lama');
        $password_baru = $this->request->getVar('password_baru');

        $db = db_connect();
        $data_user = $db->table('user')->where('id', $user)->get()->getResultArray();
        if (count($data_user) == 1) {
            if (password_verify($password_lama, $data_user[0]['password'])) {
                $password = password_hash($password_baru, PASSWORD_DEFAULT);
                if ($db->table('user')->where('id', $user)->update(['password' => $password])) {
                    session()->set('login', false);

                    session()->setFlashdata('success', 'Password berhasil diubah, silahkan login ulang');
                    return redirect()->to(base_url('auth'));
                } else {
                    session()->setFlashdata('validasi', ['Password gagal diubah']);
                    if (session()->get('jenis_user') == 'Catatan Sipil') {
                        return redirect()->to(base_url('putusanperdata'));
                    } else {
                        return redirect()->to(base_url('userdashboard'));
                    }
                };
            } else {
                session()->setFlashdata('validasi', ['Password lama salah']);
                if (session()->get('jenis_user') == 'Catatan Sipil') {
                    return redirect()->to(base_url('putusanperdata'));
                } else {
                    return redirect()->to(base_url('userdashboard'));
                }
            }
        } else {
            session()->setFlashdata('validasi', ['User tidak ditemukan']);
            if (session()->get('jenis_user') == 'Catatan Sipil') {
                return redirect()->to(base_url('putusanperdata'));
            } else {
                return redirect()->to(base_url('userdashboard'));
            }
        }
    }


    public function login_admin()
    {
        if (session()->get('login') == true) {
            if (session()->get('jenis_user') == 'admin') {

                return redirect()->to(base_url('admindashboard'));
            } elseif (session()->get('jenis_user') == 'Catatan Sipil') {
                return redirect()->to(base_url('putusanperdata'));
            } else {
                return redirect()->to(base_url('userdashboard'));
            }
        }
        return view('auth/login_admin');
    }



    public function attempt_login_admin()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $db = db_connect();
        $data_user = $db->table('admin')->where('email', $email)->get()->getResultArray();
        if (count($data_user) == 1) {
            if (password_verify($password, $data_user[0]['password'])) {
                session()->set('id_user', $data_user[0]['id']);
                session()->set('nama_user', $data_user[0]['nama']);

                session()->set('nomor_hp_user', $data_user[0]['nomor_hp']);
                session()->set('foto_user', $data_user[0]['foto_profil']);
                session()->set('jenis_user', $data_user[0]['jenis_user']);
                session()->set('email_user', $data_user[0]['email']);
                session()->set('login', true);
                session()->setFlashdata('success', 'Selamat datang ' . $data_user[0]['nama']);

                return redirect()->to('admindashboard');
            } else {
                session()->setFlashdata('fail_login', 'Password salah!');
                return redirect()->to('auth/login_admin');
            }
        } else {
            session()->setFlashdata('fail_login', 'Email tidak terdaftar!');
            return redirect()->to('auth/login_admin');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();


        return redirect()->to(base_url('auth'));
    }

    public function modal_edit_profile()
    {
        $id = $this->request->getVar('id');

        $data_user = $this->penggunaModel->get_detail_data($id);
        $data = [
            'data_user' => $data_user
        ];

        return $this->response->setJSON([view('user/modal_edit_profile', $data)]);
    }
}
