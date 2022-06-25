<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attr = [
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('superadmin123'),
            'username' => 'superadmin123'
        ];

        $user = User::create($attr);
        $user->assignRole('superadmin');

        $attr = [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'username' => 'admin123',
        ];

        // <!-- $user = App\User::create($attr); -->
        $user = User::create($attr);
        $user->assignRole('admin');

        $attr = [
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user123'),
            'username' => 'user123',
        ];

        $user = User::create($attr);
        $user->assignRole('user');
    }
}
