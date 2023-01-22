<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Pemakaian;
use App\Models\Ban;
use App\Models\Kendaraan;

class ManajemenBanController extends Controller
{
    public function index()
    {
        $ban = DB::table('kendaraan')
            ->join('mobil', 'kendaraan.id_mobil', 'mobil.id_mobil')
            ->join('supir', 'kendaraan.id_supir', 'supir.id_supir')
            ->paginate(10);

        $status = DB::table('ban')
            ->join('type_ban', 'ban.id_type', 'type_ban.id_type')
            ->join('status_ban', 'ban.id_status', 'status_ban.id_status')
            ->join('merk_ban', 'ban.merk_ban_id', 'merk_ban.merk_ban_id')
            ->paginate(10);

        $kondisi = DB::table('ban')
            ->join('type_ban', 'ban.id_type', 'type_ban.id_type')
            ->join('kondisi_ban', 'ban.id_kondisi', 'kondisi_ban.id_kondisi')
            ->join('merk_ban', 'ban.merk_ban_id', 'merk_ban.merk_ban_id')
            ->paginate(10);

        return view('admin.manajemen.manajemenban', compact('ban', 'status', 'kondisi'));
    }

    public function add(Request $request, $id_kendaraan)
    {
        $kendaraan = DB::table('kendaraan')
            ->leftjoin('mobil', 'kendaraan.id_mobil', 'mobil.id_mobil')
            ->leftjoin('supir', 'kendaraan.id_supir', 'supir.id_supir')
            ->leftjoin('ban', 'kendaraan.id_ban', 'ban.id_ban')
            ->select('kendaraan.*', 'mobil.*', 'supir.*', 'ban.*')
            ->where('id_kendaraan', $id_kendaraan)
            ->first();

        $ban = DB::table('ban')
            ->leftjoin('type_ban', 'ban.id_type', 'type_ban.id_type')
            ->leftjoin('status_ban', 'ban.id_status', 'status_ban.id_status')
            ->leftjoin('kondisi_ban', 'ban.id_kondisi', 'kondisi_ban.id_kondisi')
            ->select('ban.*', 'type_ban.*', 'status_ban.*', 'kondisi_ban.*')
            ->where('status_ban.id_status', 1)
            ->get();


        return view('admin.manajemen.tambahban', compact('ban', 'kendaraan'));
    }

    public function store(Request $request, $id_kendaraan)
    {
        $kendaraan = DB::table('kendaraan')
            ->leftjoin('mobil', 'kendaraan.id_mobil', 'mobil.id_mobil')
            ->leftjoin('supir', 'kendaraan.id_supir', 'supir.id_supir')
            ->leftjoin('ban', 'kendaraan.id_ban', 'ban.id_ban')
            ->select('kendaraan.*', 'mobil.*', 'supir.*', 'ban.*')
            ->where('id_kendaraan', $id_kendaraan)
            ->first();

        $validation = $request->validate([
            'id_ban' => 'required',
            'tgl' => 'required',

        ]);

        $data =  DB::table('kendaraan')
            ->where('id_kendaraan', $kendaraan->id_kendaraan)
            ->update([
                'id_ban' => $request->id_ban,
                'tgl' => $request->tgl,

            ]);
        if ($data) {
            return redirect()->route('viewban')->with('success', 'Berhasil Pilih Ban');
        } else {
            return redirect()->route('viewban')->with('error', 'Gagal');
        }
    }

    public function accban($id_ban)
    {
        $kendaraan = DB::table('kendaraan')
            ->leftjoin('mobil', 'kendaraan.id_mobil', 'mobil.id_mobil')
            ->leftjoin('supir', 'kendaraan.id_supir', 'supir.id_supir')
            ->leftjoin('ban', 'kendaraan.id_ban', 'ban.id_ban')
            ->select('kendaraan.*', 'mobil.*', 'supir.*', 'ban.*')
            ->where('ban.id_ban', $id_ban)
            ->first();

        $data =  DB::table('ban')
            ->where('id_ban', $kendaraan->id_ban)
            ->update([
                'id_status' => 2,

            ]);

        if ($data) {
            return redirect()->route('viewban')->with('success', 'Berhasil, Ban Telah Digunakan');
        } else {
            return redirect()->route('viewban')->with('error', 'Gagal');
        }
    }

    public function copotban($id_ban)
    {
        $kendaraan = DB::table('kendaraan')
            ->leftjoin('mobil', 'kendaraan.id_mobil', 'mobil.id_mobil')
            ->leftjoin('supir', 'kendaraan.id_supir', 'supir.id_supir')
            ->leftjoin('ban', 'kendaraan.id_ban', 'ban.id_ban')
            ->select('kendaraan.*', 'mobil.*', 'supir.*', 'ban.*')
            ->where('ban.id_ban', $id_ban)
            ->first();

        $data =  DB::table('ban')
            ->where('id_ban', $kendaraan->id_ban)
            ->update([
                'id_status' => 1,

            ]);

        $data =  DB::table('kendaraan')
            ->where('id_ban', $kendaraan->id_ban)
            ->update([
                'id_ban' => NULL,

            ]);

        if ($data) {
            return redirect()->route('viewban')->with('success', 'Berhasil, Ban Telah Dicopot');
        } else {
            return redirect()->route('viewban')->with('error', 'Gagal');
        }
    }

    public function detail($id)
    {
        $data = Ban::find($id);

        $call = Ban::find($id);
        if ($call->id_status != 1) {
            $pemasangan = DB::table('pemakaian_ban as a')
                ->join('kendaraan as b', 'a.kendaraan_id', 'b.id_kendaraan')
                ->join('mobil as c', 'b.id_mobil', 'c.id_mobil')
                ->join('supir as d', 'b.id_supir', 'd.id_supir')
                ->join('ban as e', 'a.ban_id', 'e.id_ban')
                ->select('a.pemakaian_id', 'a.tgl_ambil', 'a.km_ambil', 'c.no_polisi', 'c.jenis_kendaraan', 'd.nama_supir', 'c.tahun_pembuatan')
                ->where('a.ban_id', $id)
                ->orderBy('a.pemakaian_id', 'desc')
                ->first();
        } else {
            $pemasangan = null;
        }

        $pasang = DB::table('kendaraan as a')
            ->join('mobil as b', 'a.id_mobil', 'b.id_mobil')
            ->select('b.id_mobil', 'b.jenis_kendaraan', 'b.no_polisi', 'b.tahun_pembuatan', 'a.id_kendaraan')
            ->orderBy('a.id_kendaraan', 'asc')
            ->get();

        $copot = DB::table('kondisi_ban')->pluck('kondisi', 'id_kondisi');


        return view('admin.ban.detail', compact('data', 'pemasangan', 'pasang', 'copot'));
    }

    public function pasang(Request $request)
    {
        $request->validate([
            'idban'         => 'required',
            'tanggal'       => 'required',
            'mobil'         => 'required',
            'km'            => 'required',
            'keterangan'    => 'required'
        ]);

        // dd($request->all());
        // die;
        $id         = $request->idban;
        $tanggal    = $request->tanggal;
        $mobil      = $request->mobil;
        $km         = $request->km;
        $keterangan = $request->keterangan;

        $ban = Ban::find($id);
        $kondisi = $ban->id_kondisi;

        $insert = Pemakaian::create([
            'tgl_ambil'         => $tanggal,
            'kendaraan_id'      => $mobil,
            'ban_id'            => $id,
            'km_ambil'          => $km,
            'keterangan_ambil'  => $keterangan,
            'kondisi_ambil'     => $kondisi,
            'created_at'        => Carbon::now(),

        ]);

        if ($insert) {
            $ban->id_status = 2;
            $ban->save();
            return redirect('ban/detail/' . $id)->with('success', 'Berhasil, Ban Telah Dipasang');
        } else {
            return redirect('ban/detail/' . $id)->with('error', 'Gagal');
        }
    }

    public function copot(Request $request)
    {
        $request->validate([
            'idban'         => 'required',
            'tanggal'       => 'required',
            'km'            => 'required',
            'jarak'         => 'required',
            'kondisi'       => 'required',
            'keterangan'    => 'required'
        ]);

        // dd($request->all());
        // die;
        $id         = $request->idban;
        $tanggal    = $request->tanggal;
        $km         = $request->km;
        $jarak      = $request->jarak;
        $kondisi    = $request->kondisi;
        $keterangan = $request->keterangan;

        $insert = Pemakaian::whereBanId($id)->update([
            'tgl_kembali'           => $tanggal,
            'km_kembali'            => $km,
            'jarak_km'              => $jarak,
            'keterangan_kembali'    => $keterangan,
            'kondisi_kembali'       => $kondisi,
            'updated_at'            => Carbon::now(),

        ]);

        if ($insert) {
            $ban = Ban::find($id);
            $ban->id_status = 1;
            $ban->id_kondisi = $kondisi;
            $ban->save();
            return redirect('ban/detail/' . $id)->with('success', 'Berhasil, Ban Telah Dikembalikan');
        } else {
            return redirect('ban/detail/' . $id)->with('error', 'Gagal');
        }
    }
}
