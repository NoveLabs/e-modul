<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $table = "materi";
    protected $guarded = [
    ];

    public function getSingleData($id)
    {
        return Materi::select([
            'materi.id',
            'materi.judul_tema',
            'materi.link',
            'materi.tema',
            'materi.teks_materi',
            \DB::raw('DATE_FORMAT(materi.created_at, "%d-%b-%Y")  as tgl'),
        ])
        ->where('id', $id)->first();
    }

    public function getAllDataByTema($id)
    {
        return Materi::select([
            'materi.id',
            'materi.link',
            'materi.tema',
            'materi.teks_materi',
            'materi.judul_tema',
            \DB::raw('DATE_FORMAT(materi.created_at, "%d-%b-%Y")  as tgl'),
        ])
        ->where('tema', $id)->get();
    }
}
