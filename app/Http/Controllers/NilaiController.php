<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penilaian;
use Datatables;

class NilaiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $model;

    public function __construct()
    {
        $this->middleware('auth');
        $this->model = new Penilaian();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            return datatables()->of(
            Penilaian::select('penilaian.nilai',
            'users.name as user_id',
            'penilaian.tema',
            'materi.judul_tema as id_materi',
            \DB::raw('DATE_FORMAT(penilaian.created_at, "%d-%b-%Y")  as tgl')
            )->join('users', 'users.id', '=', 'penilaian.user_id')->join('materi', 'materi.id', '=', 'penilaian.id_materi')->where('penilaian.tema', 1)
            )
            ->editColumn('tema', function($row){
                if($row->tema == 1) {
                    $txt = 'Lingkungan';
                }
                if($row->tema == 2) {
                    $txt ='Sosial';
                }
                if($row->tema == 3) {
                    $txt = 'Kesehatan';
                }

                return $txt;
            })
            ->addIndexColumn(['tema'])
            ->make(true);
        }
        return view('penilaian.index');
    }

    public function index_sosial(Request $request)
    {
        if($request->ajax()) {
            return datatables()->of( Penilaian::select('penilaian.nilai',
            'users.name as user_id',
            'penilaian.tema',
            'materi.judul_tema as id_materi',
            \DB::raw('DATE_FORMAT(penilaian.created_at, "%d-%b-%Y")  as tgl')
            )->join('users', 'users.id', '=', 'penilaian.user_id')->join('materi', 'materi.id', '=', 'penilaian.id_materi')->where('penilaian.tema', 2)
            )
            ->editColumn('tema', function($row){
                if($row->tema == 1) {
                    $txt = 'Lingkungan';
                }
                if($row->tema == 2) {
                    $txt ='Sosial';
                }
                if($row->tema == 3) {
                    $txt = 'Kesehatan';
                }

                return $txt;
            })
            ->addIndexColumn(['tema'])
            ->make(true);
        }
        return view('penilaian.index_sosial');
    }

    public function index_kesehatan(Request $request)
    {
        if($request->ajax()) {
            return datatables()->of( Penilaian::select('penilaian.nilai',
            'users.name as user_id',
            'penilaian.tema',
            'materi.judul_tema as id_materi',
            \DB::raw('DATE_FORMAT(penilaian.created_at, "%d-%b-%Y")  as tgl')
            )->join('users', 'users.id', '=', 'penilaian.user_id')->join('materi', 'materi.id', '=', 'penilaian.id_materi')->where('penilaian.tema', 3)
            )
            ->editColumn('tema', function($row){
                if($row->tema == 1) {
                    $txt = 'Lingkungan';
                }
                if($row->tema == 2) {
                    $txt ='Sosial';
                }
                if($row->tema == 3) {
                    $txt = 'Kesehatan';
                }

                return $txt;
            })
            ->addIndexColumn(['tema'])
            ->make(true);
        }
        return view('penilaian.index_kesehatan');
    }

    public function show($id)
    {
        $data = $this->model->getSingleData($id);

        return Response()->json($data);
    }

}
