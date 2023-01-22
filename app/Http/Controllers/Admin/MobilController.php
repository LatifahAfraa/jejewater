<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mobil;
use App\Models\Jenis;
use Illuminate\Support\Carbon;

class MobilController extends Controller
{
    public function index()
    {
        $mobil = DB::table('mobil')->orderBy('id_mobil', 'desc')->get();

        return view('admin.mobil.mobil', compact('mobil'));
    }

    public function add()
    {
        $jenis = Jenis::pluck('jenis_nama', 'jenis_id');
        $date  = Carbon::now()->format('Y-m-d');
        return view('admin.mobil.addmobil', compact('jenis', 'date'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_polisi'         => 'required',
            'jenis_kendaraan'   => 'required|string|min:3|max:100',
            'nama_pemilik'      => 'required|string|min:3|max:100',
            'tahun_pembuatan'   => 'required|min:4|max:4',
            'pajak'             => 'required',
            'stnk'              => 'required',
            'keterangan'        => 'nullable|string|min:3',
        ]);

        $no_polisi          = $request->no_polisi;
        $jenis_kendaraan    = $request->jenis_kendaraan;
        $nama_pemilik       = $request->nama_pemilik;
        $tahun_pembuatan    = $request->tahun_pembuatan;
        $keterangan         = $request->keterangan;

        $pajak      = $request->pajak;
        // $newPajak   = Carbon::createFromFormat('d F, Y', $pajak)->format('Y-m-d');

        $stnk       = $request->stnk;
        // $newStnk    = Carbon::createFromFormat('d F, Y', $stnk)->format('Y-m-d');

        $data = Mobil::create([
            'no_polisi'         => $no_polisi,
            'jenis_kendaraan'   => $jenis_kendaraan,
            'nama_pemilik'      => $nama_pemilik,
            'tahun_pembuatan'   => $tahun_pembuatan,
            'pajak'             => $pajak,
            'stnk'              => $stnk,
            'keterangan'        => $keterangan,
        ]);

        if ($data) {
            return redirect()->route('mobil')->with('success', 'Berhasil');
        } else {
            return redirect()->route('mobil')->with('error', 'Gagal');
        }
    }

    public function delete($id_mobil)
    {
        $data = Mobil::whereIdMobil($id_mobil)->delete();

        if ($data) {
            return redirect()->route('mobil')->with('success', 'Berhasil hapus data');
        } else {
            return redirect()->route('mobil')->with('error', 'gagal hapus data');
        }
    }

    public function edit($id_mobil)
    {
        $mobil = Mobil::find($id_mobil);
        $date  = Carbon::now()->format('Y-m-d');

        return view('admin.mobil.editmobil', compact('mobil', 'date'));
    }

    public function update(Request $request, $id_mobil)
    {
        $request->validate([
            'no_polisi'         => 'required',
            'jenis_kendaraan'   => 'required|string|min:3|max:100',
            'nama_pemilik'      => 'required|string|min:3|max:100',
            'tahun_pembuatan'   => 'required|min:4|max:4',
            'pajak'             => 'required',
            'stnk'              => 'required',
            'keterangan'        => 'nullable|string|min:3',
        ]);

        $no_polisi          = $request->no_polisi;
        $jenis_kendaraan    = $request->jenis_kendaraan;
        $nama_pemilik       = $request->nama_pemilik;
        $tahun_pembuatan    = $request->tahun_pembuatan;
        $keterangan         = $request->keterangan;

        $pajak      = $request->pajak;
        // $newPajak   = Carbon::createFromFormat('d F, Y', $pajak)->format('Y-m-d');

        $stnk       = $request->stnk;
        // $newStnk    = Carbon::createFromFormat('d F, Y', $stnk)->format('Y-m-d');

        $data =  Mobil::whereIdMobil($id_mobil)->update([
            'no_polisi'         => $no_polisi,
            'jenis_kendaraan'   => $jenis_kendaraan,
            'nama_pemilik'      => $nama_pemilik,
            'tahun_pembuatan'   => $tahun_pembuatan,
            'pajak'             => $pajak,
            'stnk'              => $stnk,
            'keterangan'        => $keterangan,

        ]);
        if ($data) {
            return redirect()->route('mobil')->with('success', 'Berhasil Diupdate');
        } else {
            return redirect()->route('mobil')->with('error', 'Gagal');
        }
    }
}
