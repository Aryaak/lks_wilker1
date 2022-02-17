<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role_id' => 1,
            'name' => 'Admin Arya',
            'email' => 'admin.arya@amazingnews.com',
            'password' => bcrypt('secret123')
        ]);
    }
}
