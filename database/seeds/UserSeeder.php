<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            'name' => 'Yuri Dimas',
            'email' => 'yuridimas00@gmail.com',
            'password' => Hash::make('password'),
            'created_at' => (new datetime()),
            'updated_at' => (new datetime()),
        ]);

        factory(User::class, 50)->create();
    }
}
