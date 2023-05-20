<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Models\Post_model;

Paginator::useBootstrap();

class Post extends Controller
{

    // Postpage
    public function index()
    {
        //proteksi halaman
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }

        Paginator::useBootstrap();
        $site     = DB::table('konfigurasi')->first();
        $m_post     = new Post_model();
        // $post = $m_post->listing();
        $site_config   = DB::table('konfigurasi')->first();

        $status_post = 'publish';
        $paginate = 5;
        $post = $m_post->listing($paginate, $status_post);

        // if (request('search')) {
        //     $post->where('judul_post', 'like', '%' . request('search') . '%');
        // }

        $data = array(
            'title'     => 'Tutorial Backend',
            'site'        => $site,
            'site_config'        => $site_config,
            'post'    => $post,
            'posts'    => $post,
            'content'   => 'post/index'
        );
        return view('layout/wrapper', $data);
    }

    // Postpage
    public function kategori($slug_kategori)
    {
        //proteksi halaman
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }

        Paginator::useBootstrap();
        $site       = DB::table('konfigurasi')->first();
        $site_config   = DB::table('konfigurasi')->first();
        $kategori   = DB::table('kategori')->where('slug_kategori', $slug_kategori)->first();
        if (!$kategori) {
            return redirect('post');
        }
        $id_kategori = $kategori->id_kategori;
        $model      = new Post_model();
        $paginate = 5;
        $post     = $model->kategori_depan($id_kategori, $paginate);


        $data = array(
            'title'     => $kategori->nama_kategori,
            'site'      => $site,
            'site_config'        => $site_config,
            'post'    => $post,
            'posts'    => $post,
            'content'   => 'post/index'
        );
        return view('layout/wrapper', $data);
    }

    // kontak
    public function read($slug_post)
    {
        //proteksi halaman
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }

        Paginator::useBootstrap();
        $site   = DB::table('konfigurasi')->first();
        $site_config   = DB::table('konfigurasi')->first();
        // $post = DB::table('post')->where('status_post','Publish')->orderBy('id_post', 'DESC')->get();
        $model  = new Post_model();
        $read   = $model->read($slug_post);
        if (!$read) {
            return redirect('post');
        }

        $data = array(
            'title'     => $read->judul_post,
            'site'      => $site,
            'site_config'        => $site_config,
            'read'      => $read,
            'content'   => 'post/read'
        );
        return view('layout/wrapper', $data);
    }

    // Cari
    public function cari(Request $request)
    {
        //proteksi halaman
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }

        $mypost           = new Post_model();
        $site_config   = DB::table('konfigurasi')->first();
        $keywords           = $request->keywords;
        $post             = $mypost->cari($keywords);
        $kategori           = DB::table('kategori')->orderBy('urutan', 'ASC')->get();

        $data = array(
            'title'             => 'Tutorial Backend',
            'post'            => $post,
            'posts'            => $post,
            'site_config'        => $site_config,
            'kategori'   => $kategori,
            'content'           => 'post/index'
        );
        return view('layout/wrapper', $data);
    }
}
