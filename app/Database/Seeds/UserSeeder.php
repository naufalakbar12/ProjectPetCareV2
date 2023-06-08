<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'name' => 'Admin',
            'username'    => 'admin',
            'role'    => 'ADMIN',
            'password'    => md5("123456"),
        ];

        // Simple Queries
        $this->db->table('users')->insert($data);

        $data = [
            'name' => 'UserTest',
            'username'    => 'usertes',
            'role'    => 'USER',
            'password'    => md5("123456"),
        ];

        // Simple Queries
        $this->db->table('users')->insert($data);
    }
}
