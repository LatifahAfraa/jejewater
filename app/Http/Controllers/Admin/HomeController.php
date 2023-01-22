<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $baru     = DB::table('ban')->whereIdKondisi(1)->count();
        $v1       = DB::table('ban')->whereIdKondisi(2)->count();
        $v2       = DB::table('ban')->whereIdKondisi(3)->count();
        $other    = DB::table('ban')->whereIdKondisi(4)->count();
        $total    = DB::table('ban')->count();
        $terpakai = DB::table('ban')->whereIdStatus(2)->count();
        $tersedia = DB::table('ban')->whereIdStatus(1)->count();

//terpakai
        $baruP     = DB::table('ban')->whereIdKondisi(1)->whereIdStatus(2)->count();
        $v1P       = DB::table('ban')->whereIdKondisi(2)->whereIdStatus(2)->count();
        $v2P       = DB::table('ban')->whereIdKondisi(3)->whereIdStatus(2)->count();
        $otherP    = DB::table('ban')->whereIdKondisi(4)->whereIdStatus(2)->count();

//tersedia
        $baruS     = DB::table('ban')->whereIdKondisi(1)->whereIdStatus(1)->count();
        $v1S       = DB::table('ban')->whereIdKondisi(2)->whereIdStatus(1)->count();
        $v2S       = DB::table('ban')->whereIdKondisi(3)->whereIdStatus(1)->count();
        $otherS    = DB::table('ban')->whereIdKondisi(4)->whereIdStatus(1)->count();


        $data = DB::table('ban as a')
            ->join('kondisi_ban as b', 'a.id_kondisi', 'b.id_kondisi')
            ->join('type_ban as c', 'a.id_type', 'c.id_type')
            ->join('status_ban as d', 'a.id_status', 'd.id_status')
            ->select('a.*', 'b.kondisi', 'c.nama_type', 'd.status')
            ->orderBy('a.id_ban', 'DESC')
            ->limit(4)
            ->get();


        return view('admin.home', compact('data', 'baru', 'v1', 'v2', 'other', 'terpakai', 'tersedia', 'total', 'baruP', 'v1P', 'v2P', 'otherP', 'baruS', 'v1S', 'v2S', 'otherS'));
    }

    public function add($id_ban)
    {
        $mobil = DB::table('mobil')->get();
        $sopir = DB::table('supir')->get();
        $ban   = DB::table('ban')
            ->leftjoin('type_ban', 'ban.id_type', 'type_ban.id_type')
            ->leftjoin('status_ban', 'ban.id_status', 'status_ban.id_status')
            ->leftjoin('kondisi_ban', 'ban.id_kondisi', 'kondisi_ban.id_kondisi')
            ->leftjoin('merk_ban', 'ban.merk_ban_id', 'merk_ban.merk_ban_id')
            ->select('ban.*', 'type_ban.*', 'status_ban.*', 'kondisi_ban.*', 'merk_ban.*')
            ->where('id_ban', $id_ban)
            ->first();

        return view('admin.manajemen.pasangban', compact('mobil', 'ban', 'sopir'));
    }

    public function pasang(Request $request, $id_ban)
    {
        $validation = $request->validate([
            'id_ban' => 'required',
            'id_mobil' => 'required',
            'id_supir' => 'required',
        ]);

        $data =  DB::table('kendaraan')
            ->insert([
                'id_ban' => $request->id_ban,
                'id_mobil' => $request->id_mobil,
                'id_supir' => $request->id_supir,

            ]);
        $data =  DB::table('ban')
            ->where('id_ban', $id_ban)
            ->update([
                'id_status' => 2,

            ]);
        if ($data) {
            return redirect()->route('home')->with('success', 'Berhasil, Ban Telah Terpasang');
        } else {
            return redirect()->route('home')->with('error', 'Gagal');
        }
    }

    public function search(Request $request)
    {
        $output = "";
        $data = DB::table('ban as a')
            ->join('kondisi_ban as b', 'a.id_kondisi', 'b.id_kondisi')
            ->join('type_ban as c', 'a.id_type', 'c.id_type')
            ->join('status_ban as d', 'a.id_status', 'd.id_status')
            ->select('a.*', 'b.kondisi', 'c.nama_type', 'd.status')
            ->where('a.no_seri_ban', 'like', '%' . $request->search . '%')
            ->orWhere('b.kondisi', 'like', '%' . $request->search . '%')
            ->orWhere('c.nama_type', 'like', '%' . $request->search . '%')
            ->get();

        foreach ($data as $a) {
            $output .=
                '<tr>
                    <td class="font-weight-bold">
                        <div class="media-body">
                            <h5 class="mb-1">
                                <a class="text-black" href="' . url('/ban/detail/' . $a->id_ban) . '">

                                    ' . $a->nama_type . ' [' . $a->no_seri_ban . ']
                                </a>
                            </h5>
                            <p class="d-block mb-0">
                                <i class="fa fa-truck ml-1"></i>
                                <a href="' . url('/ban/detail/' . $a->id_ban) . '">
                                ' . $a->status . '
                                </a>
                            </p>
                        </div>
                    </td>
                    <td class="text-center" width="5%">
                        <div class="dropdown ml-auto text-right">
                            <a href="' . url('/ban/detail/' . $a->id_ban) . '">
                                <div class="btn-link" data-toggle="dropdown">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24"
                                        version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none"
                                            fill-rule="evenodd">
                                            <rect x="0" y="0" width="24"
                                                height="24">
                                            </rect>
                                            <circle fill="#000000" cx="12" cy="5"
                                                r="2">
                                            </circle>
                                            <circle fill="#000000" cx="12" cy="12"
                                                r="2">
                                            </circle>
                                            <circle fill="#000000" cx="12" cy="19"
                                                r="2">
                                            </circle>
                                        </g>
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </td>
                </tr>';
        }

        return response($output);
    }
}
