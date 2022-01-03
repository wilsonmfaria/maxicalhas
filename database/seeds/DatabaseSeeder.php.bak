<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeed::class);
        $this->call(RoleSeed::class);
        $this->call(UserSeed::class);
        DB::unprepared(file_get_contents('C:\\Portable\\xampp\\htdocs\\maxicalhas.loja\\storage\\arquivos\\clientes.sql'));
        DB::unprepared(file_get_contents('C:\\Portable\\xampp\\htdocs\\maxicalhas.loja\\storage\\arquivos\\ordems.sql'));
        DB::unprepared(file_get_contents('C:\\Portable\\xampp\\htdocs\\maxicalhas.loja\\storage\\arquivos\\items.sql'));
    }
}
