<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        /*
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678')
        ]);

        User::create([
            'name' => 'Secretaria',
            'email' => 'secretaria@admin.com',
            'password' => Hash::make('12345678')
        ]);

        User::create([
            'name' => 'Doctor1',
            'email' => 'doctor1@admin.com',
            'password' => Hash::make('12345678')
        ]);

        User::create([
            'name' => 'Paciente1',
            'email' => 'paciente1@admin.com',
            'password' => Hash::make('12345678')
        ]);
        */

        /* Seeder para los Roles y Permisos */

        /* https://spatie.be/docs/laravel-permission/v6/basic-usage/basic-usage 

            $role = Role::create(['name' => 'writer']);
        */

        $admin = Role::create(['name' => 'admin']);

        $secretaria = Role::create(['name' => 'secretaria']);

        $doctor = Role::create(['name' => 'doctor']);

        $paciente = Role::create(['name' => 'paciente']);

        $usuario = Role::create(['name' => 'usuario']);
        
        $this->call([PacienteSeeder::class]);
    }
}
