<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Administrador',
                'email' => 'vriverak@miumg.edu.gt',
                'password' => password_hash('123456', PASSWORD_DEFAULT),
                'profile_image' => null,
            ]
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
