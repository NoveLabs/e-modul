<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $table = "jawaban";
    protected $guarded = [
    ];

    public function getSingleData($id)
    {
        return Jawaban::select([
            'jawaban.*',
            \DB::raw('DATE_FORMAT(jawaban.created_at, "%d-%b-%Y")  as tgl'),
        ])
        ->where('id', $id)->first();
    }

}
