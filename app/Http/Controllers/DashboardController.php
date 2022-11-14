<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Siswa;

class DashboardController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();
        $guru =  Guru::all();
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        return view('Dashboard.index', compact('siswa', 'guru', 'kelas', 'mapel' ));
    }
}
