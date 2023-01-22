<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ManajemenKendaraanController extends Controller
{
    public function index()
    {
        $kendaraan = DB::table('kendaraan')
            ->join('mobil', 'kendaraan.id_mobil', 'mobil.id_mobil')
            ->join('supir', 'kendaraan.id_supir', 'supir.id_supir')
            ->orderBy('kendaraan.id_kendaraan', 'desc')
            ->get();

        return view('admin.manajemen.manajemenmobil', compact('kendaraan'));
    }

    public function add()
    {
        $mobil = DB::table('mobil')->select('jenis_kendaraan', 'id_mobil', 'no_polisi')->orderBy('id_mobil', 'desc')->get();
        $supir = DB::table('supir')->pluck('nama_supir', 'id_supir');

        return view('admin.manajemen.addkendaraan', compact('mobil', 'supir'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mobil' => 'required',
            'sopir' => 'required',
        ]);

        $data =  DB::table('kendaraan')->insert([
            'id_mobil'      => $request->mobil,
            'id_supir'      => $request->sopir,
            'create_time'   => Carbon::now(),
        ]);
        if ($data) {
            return redirect()->route('kendaraan')->with('success', 'Berhasil menambahkan data');
        } else {
            return redirect()->route('kendaraan')->with('error', 'Gagal menambahkan data');
        }
    }

    public function view()
    {
        return view('admin.manajemen.manajemenban');
    }

    public function delete($id)
    {
        $data = DB::table('kendaraan')->whereIdKendaraan($id)->delete();
        if ($data) {
            return redirect()->route('kendaraan')->with('success', 'Berhasil hapus data');
        } else {
            return redirect()->route('kendaraan')->with('error', 'gagal hapus data');
        }
    }
}
