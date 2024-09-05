<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Secretaria;
use App\Models\Doctor;
use App\Models\Consultorio;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([RoleSeeder::class]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678')
        ])->assignRole('admin');

        User::create([
            'name' => 'Secretaria',
            'email' => 'secretaria@admin.com',
            'password' => Hash::make('12345678')
        ])->assignRole('secretaria');

        Secretaria::create([
            'nombres'=>'Secretaria',
            'apellidos'=>'1',
            'ci'=>'6054345',
            'celular'=>'69965432',
            'fecha_nacimiento'=>'12/05/2001',
            'direccion'=>'Miraflores, Calle 3, N°345',
            'user_id'=>'2'
        ]);

        User::create([
            'name' => 'Doctor1',
            'email' => 'doctor1@admin.com',
            'password' => Hash::make('12345678')
        ])->assignRole('doctor');

        Doctor::create([
            'nombres'=>'Doctor1',
            'apellidos'=>'Fernandez',
            'telefono'=>'2345434',
            'licencia_medica'=>'34834568',
            'especialidad'=>'Pediatría',
            'user_id'=>'3'
        ]);

        User::create([
            'name' => 'Doctor2',
            'email' => 'doctor2@admin.com',
            'password' => Hash::make('12345678')
        ])->assignRole('doctor');

        Doctor::create([
            'nombres'=>'Doctor2',
            'apellidos'=>'Valencia',
            'telefono'=>'2345583',
            'licencia_medica'=>'344667785',
            'especialidad'=>'Odontología',
            'user_id'=>'4'
        ]);

        User::create([
            'name' => 'Doctor3',
            'email' => 'doctor3@admin.com',
            'password' => Hash::make('12345678')
        ])->assignRole('doctor');
        
        Doctor::create([
            'nombres'=>'Doctor3',
            'apellidos'=>'Vecerra',
            'telefono'=>'2845643',
            'licencia_medica'=>'934733474',
            'especialidad'=>'Fisioterapia',
            'user_id'=>'5'
        ]);

        Consultorio::create([
            'nombre'=>'Pediatría',
            'ubicacion'=>'P1-01',
            'capacidad'=>'10',
            'telefono'=>'2343456',
            'especialidad' => 'Pediatría',
            'estado'=>'Activo'
        ]);

        Consultorio::create([
            'nombre'=>'Odontología',
            'ubicacion'=>'P2-01',
            'capacidad'=>'5',
            'telefono'=>'2345678',
            'especialidad' => 'Odontología',
            'estado'=>'Activo'
        ]);

        Consultorio::create([
            'nombre'=>'Fisioterapia',
            'ubicacion'=>'P1-02',
            'capacidad'=>'3',
            'telefono'=>'2564567',
            'especialidad' => 'Fisioterapia',
            'estado'=>'Activo'
        ]);

        User::create([
            'name' => 'Paciente1',
            'email' => 'paciente1@admin.com',
            'password' => Hash::make('12345678')
        ])->assignRole('paciente');

        User::create([
            'name' => 'Usuario1',
            'email' => 'usuario1@admin.com',
            'password' => Hash::make('12345678')
        ])->assignRole('usuario');
        
        $this->call([PacienteSeeder::class]);
    }
}
