<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $rawpassword = '12345';
        $hashpassword = password_hash($rawpassword, PASSWORD_DEFAULT);
        $email = 'onsdee86@gmail.com';
        $nama = 'Oka';



        $data = [
            'nama' => $nama,
            'email' => $email,

            'password' => $hashpassword,
        ];

        $this->db->table('auth')->insert($data);
    }
}
