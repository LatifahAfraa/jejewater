<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DB;
use App\Models\Pemakaian;

class PemakaianBanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pengambilan()
    {
        $data = DB::table('pemakaian_ban as a')
            ->join('kendaraan as b', 'a.kendaraan_id', '=', 'b.id_kendaraan')
            ->join('ban as c', 'a.ban_id', '=', 'c.id_ban')
            ->join('mobil as d', 'b.id_mobil', 'd.id_mobil')
            ->join('supir as e', 'b.id_supir', 'e.id_supir')
            ->join('kondisi_ban as f', 'c.id_kondisi', 'f.id_kondisi')
            ->select('a.tgl_ambil', 'd.no_polisi', 'e.nama_supir', 'a.km_ambil', 'a.keterangan_ambil', 'a.kondisi_ambil', 'f.kondisi', 'c.no_seri_ban')
            ->orderBy('a.pemakaian_id', 'desc')
            ->get();
        return view('admin.pemakaian.pengambilan', compact('data'));
    }

    public function pengembalian()
    {
        $data = DB::table('pemakaian_ban as a')
            ->join('kendaraan as b', 'a.kendaraan_id', '=', 'b.id_kendaraan')
            ->join('ban as c', 'a.ban_id', '=', 'c.id_ban')
            ->join('mobil as d', 'b.id_mobil', 'd.id_mobil')
            ->join('supir as e', 'b.id_supir', 'e.id_supir')
            ->join('kondisi_ban as f', 'c.id_kondisi', 'f.id_kondisi')
            ->select('a.tgl_kembali', 'a.km_kembali', 'a.jarak_km', 'a.keterangan_kembali', 'a.kondisi_kembali', 'c.no_seri_ban', 'd.no_polisi', 'e.nama_supir')
            ->orderBy('a.pemakaian_id', 'desc')
            ->get();
        // dd($data);
        return view('admin.pemakaian.pengembalian', compact('data'));
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
