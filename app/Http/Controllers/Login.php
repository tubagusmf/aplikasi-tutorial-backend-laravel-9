<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User_model;

class Login extends Controller
{
    // index
    public function index()
    {
        $site     = DB::table('konfigurasi')->first();
        $data = [
            'site'        => $site,
            'title' => 'Halaman Login'
        ];
        return view('login/index', $data);
    }

    // Cek
    public function check(Request $request)
    {
        $username   = $request->username;
        $password   = $request->password;
        $model      = new User_model();
        $user       = $model->login($username, $password);
        if ($user) {
            $request->session()->put('id_user', $user->id_user);
            $request->session()->put('nama', $user->nama);
            $request->session()->put('username', $user->username);
            $request->session()->put('gambar', $user->gambar);
            $request->session()->put('akses_level', $user->akses_level);
            if ($user->akses_level == 'Admin') {
                return redirect('admin/dasbor')->with(['sukses' => 'Anda berhasil login']);
            } else {
                return redirect('home')->with(['sukses' => 'Anda berhasil login']);
            }
        } else {
            return redirect('login')->with(['warning' => 'Mohon maaf, Username atau password salah']);
        }
    }

    // Homepage
    public function logout()
    {
        Session()->forget('id_user');
        Session()->forget('nama');
        Session()->forget('username');
        Session()->forget('gambar');
        Session()->forget('akses_level');
        return redirect('login')->with(['sukses' => 'Anda berhasil logout']);
    }
}
