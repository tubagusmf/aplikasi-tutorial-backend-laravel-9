<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Image;
use App\Models\Konfigurasi_model;

class Konfigurasi extends Controller
{
    // Main page
    public function index()
    {

        //proteksi halaman
        if (Session()->get('akses_level') == "User") { //jika akses_level user, maka tidak bisa login ke dasbor admin
            $last_page = url()->full();
            return redirect('login?redirect=' . $last_page)->with(['warning' => 'Mohon maaf, Anda belum login.']);
        }
        //end proteksi halaman

        $mykonfigurasi     = new Konfigurasi_model();
        $site             = $mykonfigurasi->listing();

        $data = array(
            'title'        => 'Data Konfigurasi',
            'site'         => $site,
            'content'      => 'admin/konfigurasi/index'
        );
        return view('admin/layout/wrapper', $data);
    }

    // logo
    public function logo()
    {

        //proteksi halaman
        if (Session()->get('akses_level') == "User") { //jika akses_level user, maka tidak bisa login ke dasbor admin
            $last_page = url()->full();
            return redirect('login?redirect=' . $last_page)->with(['warning' => 'Mohon maaf, Anda belum login.']);
        }
        //end proteksi halaman

        $mykonfigurasi  = new Konfigurasi_model();
        $site           = $mykonfigurasi->listing();

        $data = array(
            'title'        => 'Update Logo',
            'site'         => $site,
            'content'      => 'admin/konfigurasi/logo'
        );
        return view('admin/layout/wrapper', $data);
    }

    // Proses
    public function proses(Request $request)
    {

        //proteksi halaman
        if (Session()->get('akses_level') == "User") { //jika akses_level user, maka tidak bisa login ke dasbor admin
            $last_page = url()->full();
            return redirect('login?redirect=' . $last_page)->with(['warning' => 'Mohon maaf, Anda belum login.']);
        }
        //end proteksi halaman

        request()->validate([
            'namaweb'          => 'required'
        ]);
        DB::table('konfigurasi')->where('id_konfigurasi', $request->id_konfigurasi)->update([
            'namaweb'           => $request->namaweb,
            'tentang'      => $request->tentang,
            'email'         => $request->email,
            'alamat'           => $request->alamat,
            'telepon'          => $request->telepon,
            'facebook'           => $request->facebook,
            'instagram'           => $request->instagram,
            'whatsapp'             => $request->whatsapp,
            'tanggal'    => date('Y-m-d H:i:s'),
            'id_user'           => Session()->get('id_user')
        ]);
        return redirect('admin/konfigurasi')->with(['sukses' => 'Data telah diupdate']);
    }

    // proses_logo
    public function proses_logo(Request $request)
    {

        //proteksi halaman
        if (Session()->get('akses_level') == "User") { //jika akses_level user, maka tidak bisa login ke dasbor admin
            $last_page = url()->full();
            return redirect('login?redirect=' . $last_page)->with(['warning' => 'Mohon maaf, Anda belum login.']);
        }
        //end proteksi halaman

        request()->validate([
            'logo'        => 'required|file|image|mimes:jpeg,png,jpg|max:8024',
        ]);
        // UPLOAD START
        $image                  = $request->file('logo');
        $filenamewithextension  = $request->file('logo')->getClientOriginalName();
        $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        $input['nama_file']     = Str::slug($filename, '-') . '.' . $image->getClientOriginalExtension();
        $destinationPath        = './assets/upload/image/thumbs/';
        $img = Image::make($image->getRealPath(), array(
            'width'     => 150,
            'height'    => 150,
            'grayscale' => false
        ));
        $img->save($destinationPath . '/' . $input['nama_file']);
        $destinationPath = './assets/upload/image/';
        $image->move($destinationPath, $input['nama_file']);
        // END UPLOAD
        DB::table('konfigurasi')->where('id_konfigurasi', $request->id_konfigurasi)->update([
            'id_user'  => Session()->get('id_user'),
            'logo'     => $input['nama_file']
        ]);
        return redirect('admin/konfigurasi/logo')->with(['sukses' => 'Logo telah diupdate']);
    }
}
