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
            'nome'      => 'Felipe',
            'email'     => 'felipe.absx@mailinator.com',
            'telefone'  => '(71) 99876-8899',
        ]);
        User::create([
            'nome'      => 'Marcos',
            'email'     => 'marcos.absx@mailinator.com',
            'telefone'  => '(71) 97788-9900',
        ]);
        User::create([
            'nome'      => 'João',
            'email'     => 'joao.absx@mailinator.com',
            'telefone'  => '(71) 98589-6677',
        ]);
    }
}
