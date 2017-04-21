<?php

use Illuminate\Database\Seeder;
use Control\Domains\Models\LogActivityType\LogActivityType as type;

class LogActivityTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        type::truncate();
        type::create(['name' => 'registered', 'description' => 'Registrado']);
        type::create(['name' => 'logged', 'description' => 'Logado']);
        type::create(['name' => 'added', 'description' => 'Adicionado']);
        type::create(['name' => 'changead', 'description' => 'Alterado']);
        type::create(['name' => 'removed', 'description' => 'Removido']);
        type::create(['name' => 'recover-password', 'description' => 'Iniciou recuperação de senha']);
        type::create(['name' => 'reset-password', 'description' => 'Alterou a senha']);
        type::create(['name' => 'generate-password', 'description' => 'Gerou uma nova senha']);
        type::create(['name' => 'global-login-invalid', 'description' => 'Login com email e senha inválidos', 'global' => true]);
        type::create(['name' => 'global-login-password-invalid', 'description' => 'Login com senha inválida', 'global' => true]);

    }
}
