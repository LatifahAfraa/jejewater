<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BanController extends Controller
{
    public function index()
    {
        $ban = DB::table('ban')
            ->join('merk_ban', 'ban.merk_ban_id', 'merk_ban.merk_ban_id')
            ->join('type_ban', 'ban.id_type', 'type_ban.id_type')
            ->join('status_ban', 'ban.id_status', 'status_ban.id_status')
            ->join('kondisi_ban', 'ban.id_kondisi', 'kondisi_ban.id_kondisi')
            ->orderBy('ban.id_ban', 'desc')
            ->get();

        return view('admin.ban.ban', compact('ban'));
    }

    public function add()
    {
        $merk    = DB::table('merk_ban')->get();
        $type    = DB::table('type_ban')->get();
        $status  = DB::table('status_ban')->get();
        $kondisi = DB::table('kondisi_ban')->get();

        return view('admin.ban.addban', compact('merk', 'type', 'status', 'kondisi'));
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'no_seri_ban'   => 'required',
            'nama_ban'      => 'required',
            'id_type'       => 'required',
            'id_kondisi'    => 'required',
        ]);

        $data =  DB::table('ban')
            ->insert([
                'no_seri_ban'   => $request->no_seri_ban,
                'merk_ban_id'   => $request->nama_ban,
                'id_type'       => $request->id_type,
                'id_status'     => 1,
                'id_kondisi'    => $request->id_kondisi,
            ]);

        if ($data) {
            return redirect()->route('ban')->with('success', 'Berhasil');
        } else {
            return redirect()->route('ban')->with('error', 'Gagal');
        }
    }

    public function delete($id_ban)
    {
        $data = DB::table('ban')->where('id_ban', $id_ban)->delete();
        if ($data) {
            return redirect()->route('ban')->with('success', 'data berhasil dihapus');
        } else {
            return redirect()->route('ban')->with('error', 'data gagal dihapus');
        }
    }

    public function edit($id_ban)
    {
        $ban = DB::table('ban')
            ->leftjoin('merk_ban', 'ban.merk_ban_id', 'merk_ban.merk_ban_id')
            ->leftjoin('type_ban', 'ban.id_type', 'type_ban.id_type')
            ->leftjoin('status_ban', 'ban.id_status', 'status_ban.id_status')
            ->leftjoin('kondisi_ban', 'ban.id_kondisi', 'kondisi_ban.id_kondisi')
            ->select('ban.*', 'type_ban.*', 'status_ban.*', 'kondisi_ban.*')
            ->where('id_ban', $id_ban)
            ->first();

        $merk    = DB::table('merk_ban')->get();
        $type    = DB::table('type_ban')->get();
        $status  = DB::table('status_ban')->get();
        $kondisi = DB::table('kondisi_ban')->get();

        return view('admin.ban.editban', compact('merk', 'ban', 'type', 'kondisi'));
    }

    public function update(Request $request, $id_ban)
    {
        $validation = $request->validate([
            'no_seri_ban'   => 'required',
            'nama_ban'      => 'required',
            'id_type'       => 'required',
            'id_kondisi'    => 'required',
        ]);

        $data =  DB::table('ban')
            ->where('id_ban', $id_ban)
            ->update([
                'no_seri_ban'   => $request->no_seri_ban,
                'merk_ban_id'   => $request->nama_ban,
                'id_type'       => $request->id_type,
                'id_status'     => 1,
                'id_kondisi'    => $request->id_kondisi,
            ]);

        if ($data) {
            return redirect()->route('ban')->with('success', 'Berhasil Diupdate');
        } else {
            return redirect()->route('ban')->with('error', 'Gagal');
        }
    }
}
