<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use PhpParser\Node\Expr\Assign;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Administrador',
            'email'=>'admin@admin',
            'password'=>bcrypt('password')
        ])->assignRole('admin');

        User::factory(10)->create();
    }
    
}
