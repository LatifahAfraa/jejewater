<?php

namespace App\Http\Controllers\Autentikasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $data = User::where('username', $request->username)->firstOrfail();
            if (Hash::check($request->password, $data->password)) {
                session(['berhasil_login' => true]);

                Session::put('id_user', $data->id_user);
                Session::put('username', $data->username);
                Session::put('password', $data->password);
                Session::put('role', $data->role);
                Session::put('nama', $data->nama);


                return redirect()->route('home');
                // if (Session::get('role') == 1) {
                //     $baru   = DB::table('ban')->whereIdKondisi(1)->count();
                //     $v1     = DB::table('ban')->whereIdKondisi(2)->count();
                //     $v2     = DB::table('ban')->whereIdKondisi(3)->count();
                //     $other   = DB::table('ban')->whereIdKondisi(4)->count();
                //     $total    = DB::table('ban')->count();
                //     $terpakai = DB::table('ban')->whereIdStatus(2)->count();
                //     $tersedia = DB::table('ban')->whereIdStatus(1)->count();

                //     $baruP     = DB::table('ban')->whereIdKondisi(1)->whereIdStatus(2)->count();
                //     $v1P       = DB::table('ban')->whereIdKondisi(2)->whereIdStatus(2)->count();
                //     $v2P       = DB::table('ban')->whereIdKondisi(3)->whereIdStatus(2)->count();
                //     $otherP    = DB::table('ban')->whereIdKondisi(4)->whereIdStatus(2)->count();

                //     $data = DB::table('ban as a')
                //         ->join('kondisi_ban as b', 'a.id_kondisi', 'b.id_kondisi')
                //         ->join('type_ban as c', 'a.id_type', 'c.id_type')
                //         ->join('status_ban as d', 'a.id_status', 'd.id_status')
                //         ->select('a.*', 'b.kondisi', 'c.nama_type', 'd.status')
                //         ->orderBy('a.id_ban', 'DESC')
                //         ->limit(4)
                //         ->get();

                //     return view('admin.home', compact('data', 'baru', 'v1', 'v2', 'other', 'terpakai', 'tersedia', 'total'));
                // }
            }

        return back()->with('message', 'Email atau Password Salah');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
}
