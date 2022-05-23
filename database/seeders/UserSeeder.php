<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $attr = [
        //     'name' => 'Super Admin',
        //     'email' => 'superadmin@gmail.com',
        //     'password' => Hash::make('superadmin123'),
        //     'username' => 'superadmin123',
        // ];

        // $user = User::create($attr);
        // $user->assignRole('superadmin');

        // $attr = [
        //     'name' => 'Admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('admin123'),
        //     'username' => 'admin123',
        // ];

        // $user = User::create($attr);
        // $user->assignRole('admin');

        // $attr = [
        //     'name' => 'User',
        //     'email' => 'user@gmail.com',
        //     'password' => Hash::make('user123'),
        //     'username' => 'user123',
        // ];

        // $user = User::create($attr);
        // $user->assignRole('user');

        // create 10 users
        $faker = Factory::create('id_ID');
        for ($i = 0; $i < 10; $i++) {
            // rand number 8 digit
            $gender = $faker->randomElement(['male', 'female']);
            $username =  $faker->unique()->numberBetween(15000000, 23000000);
            $attr = [
                'name'      => $faker->name($gender),
                'email'     => $faker->unique()->email,
                'password'  => Hash::make('password'),
                'username'  => $username,
                'gender'    => ($gender == 'male') ? 'Pria' : 'Wanita',
                'prodi_id'  => $faker->numberBetween(1, 3),
                'born_place'   => $faker->city,
                'born_date'    => $faker->date(),
                'is_verified'   => 1,
            ];

            $user = User::create($attr);
            $user->assignRole('user');
        }

    }
}
