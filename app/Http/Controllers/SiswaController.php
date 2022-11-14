<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Mapel;
use App\Models\Kelas;
use App\Models\User;
use Validator;
use Str;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::all();
        $mapel = Mapel::all();
        $kelas = Kelas::all();
        return view('siswa.index', compact('siswa','mapel', 'kelas'));
    }
    public function data(){
        $siswa = Siswa::orderBy('id', 'asc')->get();
        
        return datatables()
        ->of($siswa)
        ->addIndexColumn()
        ->addColumn('kelas_id', function($siswa){
            return !empty($siswa->kelas->nama) ? $siswa->kelas->nama : 'Kelas belum di input';
        })
        ->addColumn('mapel_id', function($siswa){
            return !empty($siswa->mapel->nama) ? $siswa->mapel->nama : 'Mapel belum di input';
        })
            ->editColumn('aksi', function($siswa){
                return '
                <div class="btn-group">
                <button onclick="editData(`'. route('siswa.update', $siswa->id) .'`)" class="btn btn-flat btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                <button onclick="deleteData(`'.route('siswa.destroy', $siswa->id) .'`)" class="btn btn-flat btn-sm btn-danger"><i class="fa fa-trash"></i></button>
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
                'alamat' => 'required',
                'jenis_kelamin' => 'required',
                'kelas_id' => 'required',
                'mapel_id' => 'required'
            ]);
    
            if($validator->fails()){
                return response()->json($validator->errors(), 422);
            }

            $user= new User;
            $user-> role = 'siswa';
            $user-> name = $request->nama;
            $user-> email = $request->email;
            $user->password = bcrypt('12345678zxxx');
            $user->remember_token = Str::random(20);
            $user->save();

            $request->request->add(['user_id' => $user->id]);
            $siswa = Siswa::create($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Disimpan',
                'data' => $siswa
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::find($id);
        return response()->json($siswa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);
        $siswa->nama = $request->nama;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->mapel_id = $request->mapel_id;
        $siswa->kelas_id = $request->kelas_id;
        $siswa->update();

        return response()->json('Data Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        $siswa -> delete();
 
        return response()->json(null, 204);
    }
}
