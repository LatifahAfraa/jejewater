<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TypeController extends Controller
{
    public function index()
    {
        $type = DB::table('type_ban')->orderBy('id_type', 'desc')->get();

        return view('admin.type.typeban', compact('type'));
    }

    public function add()
    {
        return view('admin.type.addtypeban');
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'nama_type' => 'required',
        ]);

        $data =  DB::table('type_ban')
            ->insert([
                'nama_type' => $request->nama_type,
            ]);

        if ($data) {
            return redirect()->route('type')->with('success', 'Berhasil');
        } else {
            return redirect()->route('type')->with('error', 'Gagal');
        }
    }

    public function delete($id_type)
    {
        DB::table('type_ban')->where('id_type', $id_type)->delete();

        return redirect()->back();
    }

    public function edit($id_type)
    {
        $type = DB::table('type_ban')->where('id_type', $id_type)->first();

        return view('admin.type.edittypeban', compact('type'));
    }

    public function update(Request $request, $id_type)
    {
        $validation = $request->validate([
            'nama_type' => 'required',
        ]);

        $data =  DB::table('type_ban')
            ->where('id_type', $id_type)
            ->update([
                'nama_type' => $request->nama_type,
            ]);

        if ($data) {
            return redirect()->route('type')->with('success', 'Berhasil Diupdate');
        } else {
            return redirect()->route('type')->with('error', 'Gagal');
        }
    }
}
