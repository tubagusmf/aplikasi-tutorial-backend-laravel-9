<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Models\Kategori_model;

Paginator::useBootstrap();

class Kategori extends Controller
{

    // Kategoripage
    public function index()
    {
        //proteksi halaman
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }

        Paginator::useBootstrap();
        $site     = DB::table('konfigurasi')->first();
        $model     = new Kategori_model();
        $kategori = $model->listing();
        $site_config   = DB::table('konfigurasi')->first();

        $data = array(
            'title'     => 'Tutorial Backend',
            'site'        => $site,
            'site_config'        => $site_config,
            'kategori'    => $kategori,
            'kategoris'    => $kategori,
            'content'   => 'home/kategori'
        );
        return view('layout/wrapper', $data);
    }

    // Kategoripage
    public function kategori($slug_kategori)
    {
        //proteksi halaman
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }

        Paginator::useBootstrap();
        $site       = DB::table('konfigurasi')->first();
        $kategori   = DB::table('kategori')->where('slug_kategori', $slug_kategori)->first();
        if (!$kategori) {
            return redirect('kategori');
        }
        $id_kategori = $kategori->id_kategori;
        $model      = new Kategori_model();
        $kategori     = $model->kategori_depan($id_kategori);
        $site_config   = DB::table('konfigurasi')->first();


        $data = array(
            'title'     => $kategori->nama_kategori,
            'site'      => $site,
            'site_config'      => $site_config,
            'kategori'    => $kategori,
            'kategoris'    => $kategori,
            'content'   => 'home/kategori'
        );
        return view('layout/wrapper', $data);
    }


    // kontak
    // public function read($slug_kategori)
    // {
    //     Paginator::useBootstrap();
    //     $site   = DB::table('konfigurasi')->first();
    //     $slider = DB::table('galeri')->where('jenis_galeri', 'Kategoripage')->orderBy('id_galeri', 'DESC')->first();
    //     // $kategori = DB::table('kategori')->where('status_kategori','Publish')->orderBy('id_kategori', 'DESC')->get();
    //     $model  = new Kategori_model();
    //     $read   = $model->read($slug_kategori);
    //     if (!$read) {
    //         return redirect('kategori');
    //     }

    //     $data = array(
    //         'title'     => $read->judul_kategori,
    //         'deskripsi' => $read->judul_kategori,
    //         'keywords'  => $read->judul_kategori,
    //         'slider'    => $slider,
    //         'site'      => $site,
    //         'read'      => $read,
    //         'content'   => 'kategori/read'
    //     );
    //     return view('layout/wrapper', $data);
    // }
}
