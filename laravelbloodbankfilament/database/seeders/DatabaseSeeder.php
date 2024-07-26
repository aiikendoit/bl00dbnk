<?php

namespace Database\Seeders;

use App\Models\Patient;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(3)->create();
        // Patient::factory()->count(1000)->create();
        User::factory(10)->hasPatients(3)->create();

        User::factory()->create([
            'name' => 'Kenneth Israel',
            'email' => 'superadmin@bloodbank.ie',
            'status' => 'active',
            'role' => 'superadmin',
            'password' => bcrypt('superadmin'),
        ]);

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@bloodbank.ie',
            'status' => 'active',
            'role' => 'admin',
            'password' => bcrypt('admin'),
        ]);

        Patient::factory()->create([
            'patientIdNo' => '22028',
            'lastname' => 'Israel',
            'firstname' => 'Kenneth',
            'middlename' => 'Domingo',
            'age' => '32',
            'gender' => 'Male',
            
        ]);
    }
}
