<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Post_model;
use App\Models\Slider_model;

class Home extends Controller
{
    //public
    public function index()
    {
        //proteksi halaman
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }

        //end proteksi halaman

        $site_config    = DB::table('konfigurasi')->first();
        $slider         = DB::table('slider_gambar')->orderBy('id_slider', 'DESC')->get();
        $news           = new Post_model();
        $post           = $news->home();

        $data = array(
            'title'         => $site_config->namaweb,
            'slider'        => $slider,
            'site_config'   => $site_config,
            'post'        => $post,
            'posts'       => $post,
            'content'       => 'home/index'
        );
        return view('layout/wrapper', $data);
    }

    // Tentang
    public function tentang()
    {
        //proteksi halaman
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }

        $site_config   = DB::table('konfigurasi')->first();

        $data = array(
            'title'     => 'Tentang ' . $site_config->namaweb,
            'tentang' => $site_config->tentang,
            'site_config'      => $site_config,
            'content'   => 'home/tentang'
        );
        return view('layout/wrapper', $data);
    }

    // Team
    public function team()
    {
        //proteksi halaman
        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }

        $site_config   = DB::table('konfigurasi')->first();
        $team    = DB::table('users')->orderBy('urutan', 'ASC')->get();
        // $model     = new team_model();
        // $team = $model->listing();

        $data = array(
            'title'     => 'Team Backend',
            'site_config'      => $site_config,
            'team' => $team,
            'content'   => 'home/team'
        );
        return view('layout/wrapper', $data);
    }
}
