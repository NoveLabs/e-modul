<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $table = "penilaian";
    protected $guarded = [
    ];

    public function getSingleData($id)
    {
        return Penilaian::select([
            'penilaian.nilai',
            'penilaian.user_id',
            'penilaian.tema',
            'penilaian.id_materi',
            \DB::raw('DATE_FORMAT(penilaian.created_at, "%d-%b-%Y")  as tgl')
        ])
        ->where('id', $id)->first();
    }
}
