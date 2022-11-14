<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mapel;
use Validator;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = Guru::all();
        $mapel = Mapel::all();
        return view('guru.index', compact('guru', 'mapel'));
    }

    public function data(){
        $guru = Guru::orderBy('id', 'asc')->get();
        
        return datatables()
            ->of($guru)
            ->addIndexColumn()
            ->addColumn('mapel_id', function($guru){
                return $guru->mapel->nama;
            })
            ->editColumn('aksi', function($guru){
                return '
                <div class="btn-group">
                <button onclick="editData(`'. route('guru.update', $guru->id) .'`)" class="btn btn-flat btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                <button onclick="deleteData(`'.route('guru.destroy', $guru->id) .'`)" class="btn btn-flat btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            $validator = Validator::make ($request->all(), [
                'nama' => 'required',
                'jenis_kelamin' => 'required',
                'mapel_id' => 'required'
            ]);
    
            if($validator->fails()){
                return response()->json($validator->errors(), 422);
            }
    
            $guru = Guru::create([
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'mapel_id' => $request->mapel_id
            ]);
    
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Disimpan',
                'data' => $guru
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guru = Guru::find($id);
        return response()->json($guru);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(Guru $guru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $guru = Guru::find($id);
        $guru->nama = $request->nama;
        $guru->jenis_kelamin = $request->jenis_kelamin;
        $guru->mapel_id = $request->mapel_id;
        $guru->update();

        return response()->json('Data Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guru = Guru::find($id);
        $guru -> delete();
 
        return response()->json(null, 204);
    }
}
