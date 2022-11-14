<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;
use Validator;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mapel = Mapel::all();
        return view('mapel.index', compact('mapel'));
    }

    public function data(){
        $mapel = Mapel::orderBy('id', 'asc')->get();
        
        return datatables()
            ->of($mapel)
            ->addIndexColumn()
            ->addColumn('aksi', function($mapel){
                return '
                <div class="btn-group">
                <button onclick="editData(`'. route('mapel.update', $mapel->id) .'`)" class="btn btn-flat btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                <button onclick="deleteData(`'.route('mapel.destroy', $mapel->id) .'`)" class="btn btn-flat btn-sm btn-danger"><i class="fa fa-trash"></i></button>
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
        $validator = Validator::make ($request->all(), [
            'nama' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $mapel = Mapel::create([
            'nama' => $request->nama
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan',
            'data' => $mapel
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mapel = Mapel::find($id);
        return response()->json($mapel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function edit(Mapel $mapel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mapel = Mapel::find($id);
        $mapel->nama = $request->nama;
        $mapel->update();

        return response()->json('Data Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $mapel = Mapel::find($id);
       $mapel -> delete();

       return response()->json(null, 204);
    }
}
