<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SopirController extends Controller
{
    public function index()
    {
        $sopir = DB::table('supir')->orderBy('id_supir', 'desc')->get();

        return view('admin.sopir.sopir', compact('sopir'));
    }

    public function add()
    {
        return view('admin.sopir.addsopir');
    }

    public function edit($id_supir)
    {
        $supir = DB::table('supir')->where('id_supir', $id_supir)->first();

        return view('admin.sopir.editsopir', compact('supir'));
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'nama_supir' => 'required',
            'no_ktp' => 'required',
            'no_sim' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        $data =  DB::table('supir')
            ->insert([
                'nama_supir' => $request->nama_supir,
                'no_ktp' => $request->no_ktp,
                'no_sim' => $request->no_sim,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,

            ]);
        if ($data) {
            return redirect()->route('sopir')->with('success', 'Berhasil');
        } else {
            return redirect()->route('sopir')->with('error', 'Gagal');
        }
    }

    public function update(Request $request, $id_supir)
    {
        $supir = DB::table('supir')->where('id_supir', $id_supir)->first();

        $validation = $request->validate([
            'nama_supir' => 'required',
            'no_ktp' => 'required',
            'no_sim' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        $data =  DB::table('supir')
            ->where('id_supir', $supir->id_supir)
            ->update([
                'nama_supir' => $request->nama_supir,
                'no_ktp' => $request->no_ktp,
                'no_sim' => $request->no_sim,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,

            ]);

        if ($data) {
            return redirect()->route('sopir')->with('success', 'Berhasil Diupdate');
        } else {
            return redirect()->route('sopir')->with('error', 'Gagal');
        }
    }

    public function delete($id_supir)
    {
        DB::table('supir')->where('id_supir', $id_supir)->delete();

        return redirect()->back();
    }
}
