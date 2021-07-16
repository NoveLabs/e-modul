<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use Datatables;

class MateriController extends Controller
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
        $this->model = new Materi();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('materi.index');
    }

    public function indexLingkungan(Request $request)
    {
        if($request->ajax()) {
            return datatables()->of(Materi::select(
                'materi.id',
            'materi.judul_tema',
            'materi.link',
            'materi.tema',
            'materi.teks_materi',
            \DB::raw('DATE_FORMAT(materi.created_at, "%d-%b-%Y")  as tgl')
            )->where('tema', 1))
            ->addColumn('action', function($row){
                 return '<a href="javascript:edit(' . $row->id . ');" class="" href="#" ><i class="fa fa-edit"></i></a> 
                 <a href="javascript:deleteFunc(' . $row->id . ');" class="" href="#" ><i class="fa fa-trash"></i></a>
                 ';
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('materi.index_lingkungan');
    }

    public function lingkungan()
    {   
        $id = 1;
        $find_data = $this->model->getSingleData($id);
        $arr = json_decode($find_data->kata_kunci);
        $count = count($arr);
        return view('materi.lingkungan', compact('find_data', 'arr', 'count'));
    }

    public function addMateri(Request $request)
    {
        $data = $request->all();
        $id = $request->id;
 
        $input   =   Materi::updateOrCreate(
                    [
                     'id' => $id
                    ],
                    [
                    'judul_tema' => $data['judul_tema'],
                    'link' => $data['link'],
                    'teks_materi' => $data['teks_materi'],
                    'tema' => $data['tema']
                    ]);    

        return back();
    }

    public function showLingkungan($id)
    {
        $data = $this->model->getSingleData($id);

        return Response()->json($data);
    }

    public function destroyLingkungan(Request $request)
    {
        $lingkungan = Materi::where('id',$request->id)->delete();
      
        return Response()->json($lingkungan);
    }

    public function kesehatan()
    {
        $id = 3;
        $find_data = $this->model->getSingleData($id);
        $arr = json_decode($find_data->kata_kunci);
        $count = count($arr);
        return view('materi.kesehatan', compact('find_data', 'arr', 'count'));
    }

    public function indexKesehatan(Request $request)
    {
        if($request->ajax()) {
            return datatables()->of(Materi::select(
                'materi.link',
                'materi.id',
                'materi.judul_tema',
            'materi.tema',
            'materi.teks_materi',
            \DB::raw('DATE_FORMAT(materi.created_at, "%d-%b-%Y")  as tgl')
            )->where('tema', 3))
            ->addColumn('action', function($row){
                 return '<a href="javascript:edit(' . $row->id . ');" class="" href="#" ><i class="fa fa-edit"></i></a> 
                 <a href="javascript:deleteFunc(' . $row->id . ');" class="" href="#" ><i class="fa fa-trash"></i></a>
                 ';
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('materi.index_kesehatan');
    }

    public function sosial()
    {
        $id = 2;
        $find_data = $this->model->getSingleData($id);
        $arr = json_decode($find_data->kata_kunci);
        $count = count($arr);
        return view('materi.sosial', compact('find_data', 'arr', 'count'));
    }

    public function indexSosial(Request $request)
    {
        if($request->ajax()) {
            return datatables()->of(Materi::select(
            'materi.judul_tema',
            'materi.link',
                'materi.id',
                'materi.tema',
            'materi.teks_materi',
            \DB::raw('DATE_FORMAT(materi.created_at, "%d-%b-%Y")  as tgl'))->where('tema', 2))
            ->addColumn('action', function($row){
                 return '<a href="javascript:edit(' . $row->id . ');" class="" href="#" ><i class="fa fa-edit"></i></a> 
                 <a href="javascript:deleteFunc(' . $row->id . ');" class="" href="#" ><i class="fa fa-trash"></i></a>
                 ';
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('materi.index_sosial');
    }

   
}
