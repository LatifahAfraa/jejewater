<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DB;

class MerkBanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('merk_ban')->orderBy('merk_ban_id', 'desc')->get();
        return view('admin.merk.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.merk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'merk_ban' => 'required',
        ]);

        $data = DB::table('merk_ban')
            ->insert([
                'merk_ban_nama' => $request->merk_ban,
                'created_at'    => Carbon::now()
            ]);

        if ($data) {
            return redirect('admin/merk-ban')->with('success', 'Berhasil');
        } else {
            return redirect('admin/merk-ban')->with('error', 'Gagal');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = DB::table('merk_ban')->where('merk_ban_id', $id)->first();
        if ($edit == null)
            abort(404);

        return view('admin.merk.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'merk_ban' => 'required',
        ]);

        $data =  DB::table('merk_ban')
            ->where('merk_ban_id', $id)
            ->update([
                'merk_ban_nama' => $request->merk_ban,
                'updated_at'    => Carbon::now()
            ]);

        if ($data) {
            return redirect('admin/merk-ban')->with('success', 'Berhasil Diupdate');
        } else {
            return redirect('admin/merk-ban')->with('error', 'Gagal');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('merk_ban')->where('merk_ban_id', $id)->delete();

        if ($data) {
            return redirect('admin/merk-ban')->with('success', 'Berhasil hapus data');
        } else {
            return redirect('admin/merk-ban')->with('error', 'gagal hapus data');
        }
    }
}
