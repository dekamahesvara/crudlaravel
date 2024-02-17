<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extracurriculars
{
    private static $extracurriculars = [
        [
            "id" => 1,
            "nama" => "Basket",
            "nama_pembina" => "Calvin",
            "deskripsi" => "Basket adalah permainan yang memasukan bola kedalam ring"
        ],
        [
            "id" => 2,
            "nama" => "Futsal",
            "nama_pembina" => "Aan",
            "deskripsi" => "Futsal adalah permainan menendang bola kedalam gawang"
        ],
        [
            "id" => 3,
            "nama" => "Esport",
            "nama_pembina" => "Nando",
            "deskripsi" => "Esport adalah permainan game online"
        ],
        [
            "id" => 4,
            "nama" => "Pencak Silat",
            "nama_pembina" => "Ilham",
            "deskripsi" => "Pencak Silat adalah olahraga bela diri asal Indonesia"
        ],
        [
            "id" => 5,
            "nama" => "Musik",
            "nama_pembina" => "Pandu",
            "deskripsi" => "Ekstrakulikuler Musik adalah ekstrakulikuler yang berhubungan dengan musik"
        ],
    ];

    public static function all(){
        return self::$extracurriculars;
    }
}
