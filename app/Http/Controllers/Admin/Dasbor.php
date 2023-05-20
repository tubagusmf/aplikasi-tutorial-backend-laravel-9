<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class Dasbor extends Controller
{
    // Index
    public function index()
    {
        //proteksi halaman
        if (Session()->get('akses_level') == "User") { //jika akses_level user, maka tidak bisa login ke dasbor admin
            $last_page = url()->full();
            return redirect('login?redirect=' . $last_page)->with(['warning' => 'Mohon maaf, Anda belum login.']);
        }
        //end proteksi halaman

        $data = array(
            'title'     => 'Halaman Dasbor',
            'content'   => 'admin/dasbor/index'
        );
        return view('admin/layout/wrapper', $data);
    }
}
