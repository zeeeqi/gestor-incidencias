<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'ezequielarenilla@gmail.com')->first();

        if (!$user) {
            User::create([
                'name' => 'Ezequiel Arenilla',
                'email'=> 'ezequielarenilla@gmail.com',
                'password' => Hash::make('123'),
                'rol'=>'admin'
            ]);
        }

        $user = User::where('email', 'alejandro@gmail.com')->first();

        if (!$user) {
            User::create([
                'name' => 'Alejandro Vazquez',
                'email'=> 'alejandro@gmail.com',
                'password' => Hash::make('123')
            ]);
        }
    }

}
