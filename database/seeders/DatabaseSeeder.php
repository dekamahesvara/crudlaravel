<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Student::factory(300)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        



        // \App\Models\Student::create(
        //     [
        //     "nis" => "09672",
        //     "nama" => "Fuas",
        //     "kelas" => "11 PPLG 1",
        //     "alamat" => "Kudus",
        //     "tanggal_lahir" => "2007-02-05"
        //     ],);

        // \App\Models\Student::where('id', 27)->update(
        //     [
        //         "nama" => "Fuad"
        //     ]);

        // \App\Models\Student::destroy(1);


        \App\Models\Kelas::create(
            [
            "nama" => "11 PPLG 1",
            ],
        );
        \App\Models\Kelas::create(
            [
            "nama" => "11 PPLG 2",
            ],
        );
        \App\Models\Kelas::create(
            [
            "nama" => "11 Animasi 1",
            ],
        );
        \App\Models\Kelas::create(
            [
            "nama" => "11 Animasi 2",
            ],
        );
        \App\Models\Kelas::create(
            [
            "nama" => "11 Animasi 3",
            ],
        );
        \App\Models\Kelas::create(
            [
            "nama" => "11 Animasi 4",
            ],
        );
        \App\Models\Kelas::create(
            [
            "nama" => "11 Animasi 5",
            ],
        );
    }
}
