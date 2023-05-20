<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use Image;
use App\Models\Post_model;

class Post extends Controller
{
    // Main page
    public function index()
    {

        //proteksi halaman
        if (Session()->get('username') == "" || Session()->get('akses_level') == "User") { //jika username masih kosong, maka akan diarahkan ke halaman login
            $last_page = url()->full();
            return redirect('login?redirect=' . $last_page)->with(['warning' => 'Mohon maaf, Anda belum login.']);
        }
        //end proteksi halaman

        Paginator::useBootstrap();
        $mypost     = new Post_model();
        $post     = $mypost->post_update();
        $kategori     = DB::table('kategori')->orderBy('urutan', 'ASC')->get();

        $data = array(
            'title'       => 'Data Post',
            'post'      => $post,
            'posts'      => $post,
            'kategori'    => $kategori,
            'content'     => 'admin/post/index'
        );
        return view('admin/layout/wrapper', $data);
    }

    // Add
    public function add()
    {

        //proteksi halaman
        if (Session()->get('username') == "" || Session()->get('akses_level') == "User") { //jika username masih kosong, maka akan diarahkan ke halaman login
            $last_page = url()->full();
            return redirect('login?redirect=' . $last_page)->with(['warning' => 'Mohon maaf, Anda belum login.']);
        }
        //end proteksi halaman

        $data = array(
            'title'       => 'Data Post'
        );
        return view('admin/post/add', $data);
    }

    // Cari
    // public function cari(Request $request)
    // {
    //     if (Session()->get('username') == "") {
    //         return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
    //     }
    //     $mypost           = new Post_model();
    //     $keywords           = $request->keywords;
    //     $post             = $mypost->cari($keywords);
    //     $kategori           = DB::table('kategori')->orderBy('urutan', 'ASC')->get();

    //     $data = array(
    //         'title'             => 'Data Post',
    //         'post'            => $post,
    //         'kategori'   => $kategori,
    //         'content'           => 'admin/post/index'
    //     );
    //     return view('admin/layout/wrapper', $data);
    // }

    // Proses
    // public function proses(Request $request)
    // {
    //     $site           = DB::table('konfigurasi')->first();
    //     $pengalihan     = $request->pengalihan;
    //     // PROSES HAPUS MULTIPLE
    //     if (isset($_POST['hapus'])) {
    //         $id_postnya       = $request->id_post;
    //         for ($i = 0; $i < sizeof($id_postnya); $i++) {
    //             DB::table('post')->where('id_post', $id_postnya[$i])->delete();
    //         }
    //         return redirect($pengalihan)->with(['sukses' => 'Data telah dihapus']);
    //         // PROSES SETTING DRAFT
    //     } elseif (isset($_POST['draft'])) {
    //         $id_postnya       = $request->id_post;
    //         for ($i = 0; $i < sizeof($id_postnya); $i++) {
    //             DB::table('post')->where('id_post', $id_postnya[$i])->update([
    //                 'id_user'       => Session()->get('id_user'),
    //                 'status_post' => 'Draft'
    //             ]);
    //         }
    //         return redirect($pengalihan)->with(['sukses' => 'Data telah diubah menjadi Draft']);
    //         // PROSES SETTING PUBLISH
    //     } elseif (isset($_POST['publish'])) {
    //         $id_postnya       = $request->id_post;
    //         for ($i = 0; $i < sizeof($id_postnya); $i++) {
    //             DB::table('post')->where('id_post', $id_postnya[$i])->update([
    //                 'id_user'       => Session()->get('id_user'),
    //                 'status_post' => 'Publish'
    //             ]);
    //         }
    //         return redirect($pengalihan)->with(['sukses' => 'Data telah diubah menjadi Publish']);
    //     } elseif (isset($_POST['update'])) {
    //         $id_postnya       = $request->id_post;
    //         for ($i = 0; $i < sizeof($id_postnya); $i++) {
    //             DB::table('post')->where('id_post', $id_postnya[$i])->update([
    //                 'id_user'        => Session()->get('id_user'),
    //                 'id_kategori'    => $request->id_kategori
    //             ]);
    //         }
    //         return redirect($pengalihan)->with(['sukses' => 'Data kategori telah diubah']);
    //     }
    // }

    //Status
    public function status_post($status_post)
    {

        //proteksi halaman
        if (Session()->get('username') == "" || Session()->get('akses_level') == "User") { //jika username masih kosong, maka akan diarahkan ke halaman login
            $last_page = url()->full();
            return redirect('login?redirect=' . $last_page)->with(['warning' => 'Mohon maaf, Anda belum login.']);
        }
        //end proteksi halaman

        Paginator::useBootstrap();
        $mypost    = new Post_model();
        $post      = $mypost->status_post($status_post);
        $kategori    = DB::table('kategori')->orderBy('urutan', 'ASC')->get();

        $data = array(
            'title'             => 'Status Post: ' . $status_post,
            'post'            => $post,
            'kategori'   => $kategori,
            'content'           => 'admin/post/index'
        );
        return view('admin/layout/wrapper', $data);
    }

    //Status
    public function jenis_post($jenis_post)
    {

        //proteksi halaman
        if (Session()->get('username') == "" || Session()->get('akses_level') == "User") { //jika username masih kosong, maka akan diarahkan ke halaman login
            $last_page = url()->full();
            return redirect('login?redirect=' . $last_page)->with(['warning' => 'Mohon maaf, Anda belum login.']);
        }
        //end proteksi halaman

        Paginator::useBootstrap();
        $mypost    = new Post_model();
        $post      = $mypost->jenis_post($jenis_post);
        $kategori    = DB::table('kategori')->orderBy('urutan', 'ASC')->get();

        $data = array(
            'title'             => 'Jenis Post: ' . $jenis_post,
            'post'            => $post,
            'kategori'   => $kategori,
            'content'           => 'admin/post/index'
        );
        return view('admin/layout/wrapper', $data);
    }

    //Status
    public function author($id_user)
    {

        //proteksi halaman
        if (Session()->get('username') == "" || Session()->get('akses_level') == "User") { //jika username masih kosong, maka akan diarahkan ke halaman login
            $last_page = url()->full();
            return redirect('login?redirect=' . $last_page)->with(['warning' => 'Mohon maaf, Anda belum login.']);
        }
        //end proteksi halaman

        Paginator::useBootstrap();
        $mypost           = new Post_model();
        $post             = $mypost->author($id_user);
        $kategori    = DB::table('kategori')->orderBy('urutan', 'ASC')->get();
        $author    = DB::table('users')->where('id_user', $id_user)->orderBy('id_user', 'ASC')->first();

        $data = array(
            'title'             => 'Data Post dengan Penulis: ' . $author->nama,
            'post'            => $post,
            'kategori'   => $kategori,
            'content'           => 'admin/post/index'
        );
        return view('admin/layout/wrapper', $data);
    }

    //Kategori
    public function kategori($id_kategori)
    {

        //proteksi halaman
        if (Session()->get('username') == "" || Session()->get('akses_level') == "User") { //jika username masih kosong, maka akan diarahkan ke halaman login
            $last_page = url()->full();
            return redirect('login?redirect=' . $last_page)->with(['warning' => 'Mohon maaf, Anda belum login.']);
        }
        //end proteksi halaman

        Paginator::useBootstrap();
        $mypost    = new Post_model();
        $post      = $mypost->all_kategori($id_kategori);
        $kategori    = DB::table('kategori')->orderBy('urutan', 'ASC')->get();
        $detail      = DB::table('kategori')->where('id_kategori', $id_kategori)->first();
        $data = array(
            'title'             => 'Kategori: ' . $detail->nama_kategori,
            'post'            => $post,
            'kategori'   => $kategori,
            'content'           => 'admin/post/index'
        );
        return view('admin/layout/wrapper', $data);
    }

    // Tambah
    public function tambah()
    {

        //proteksi halaman
        if (Session()->get('username') == "" || Session()->get('akses_level') == "User") { //jika username masih kosong, maka akan diarahkan ke halaman login
            $last_page = url()->full();
            return redirect('login?redirect=' . $last_page)->with(['warning' => 'Mohon maaf, Anda belum login.']);
        }
        //end proteksi halaman

        $kategori    = DB::table('kategori')->orderBy('urutan', 'ASC')->get();

        $data = array(
            'title'             => 'Tambah Post',
            'kategori'   => $kategori,
            'content'           => 'admin/post/tambah'
        );
        return view('admin/layout/wrapper', $data);
    }

    // edit
    public function edit($id_post)
    {
        //proteksi halaman
        if (Session()->get('username') == "" || Session()->get('akses_level') == "User") { //jika username masih kosong, maka akan diarahkan ke halaman login
            $last_page = url()->full();
            return redirect('login?redirect=' . $last_page)->with(['warning' => 'Mohon maaf, Anda belum login.']);
        }
        //end proteksi halaman

        $mypost           = new Post_model();
        $post             = $mypost->detail($id_post);
        $kategori    = DB::table('kategori')->orderBy('urutan', 'ASC')->get();

        $data = array(
            'title'             => 'Edit Post',
            'post'            => $post,
            'kategori'   => $kategori,
            'content'           => 'admin/post/edit'
        );
        return view('admin/layout/wrapper', $data);
    }

    // tambah_proses
    public function tambah_proses(Request $request)
    {

        //proteksi halaman
        if (Session()->get('username') == "" || Session()->get('akses_level') == "User") { //jika username masih kosong, maka akan diarahkan ke halaman login
            $last_page = url()->full();
            return redirect('login?redirect=' . $last_page)->with(['warning' => 'Mohon maaf, Anda belum login.']);
        }
        //end proteksi halaman

        request()->validate([
            'judul_post'  => 'required|unique:post',
            'isi'           => 'required',
            'gambar'        => 'file|image|mimes:jpeg,png,jpg|max:8024',
        ]);
        // UPLOAD START
        $image                  = $request->file('gambar');
        if (!empty($image)) {
            $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
            $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input['nama_file']     = Str::slug($filename, '-') . '-' . time() . '.' . $image->getClientOriginalExtension();
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
            $slug_post = Str::slug($request->judul_post, '-');
            DB::table('post')->insert([
                'id_kategori'       => $request->id_kategori,
                'id_user'           => Session()->get('id_user'),
                'slug_post'       => $slug_post,
                'judul_post'      => $request->judul_post,
                'isi'               => $request->isi,
                'jenis_post'      => $request->jenis_post,
                'status_post'     => $request->status_post,
                'gambar'            => $input['nama_file'],
                'icon'              => $request->icon,
                'keywords'          => $request->keywords,
                'tanggal_publish'   => date('Y-m-d', strtotime($request->tanggal_publish)) . ' ' . $request->jam_publish,
                'urutan'            => $request->urutan,
                'tanggal_post'      => date('Y-m-d H:i:s')
            ]);
        } else {
            $slug_post = Str::slug($request->judul_post, '-');
            DB::table('post')->insert([
                'id_kategori'       => $request->id_kategori,
                'id_user'           => Session()->get('id_user'),
                'slug_post'       => $slug_post,
                'judul_post'      => $request->judul_post,
                'isi'               => $request->isi,
                'jenis_post'      => $request->jenis_post,
                'status_post'     => $request->status_post,
                'icon'              => $request->icon,
                'keywords'          => $request->keywords,
                'tanggal_publish'   => date('Y-m-d', strtotime($request->tanggal_publish)) . ' ' . $request->jam_publish,
                'urutan'            => $request->urutan,
                'tanggal_post'      => date('Y-m-d H:i:s')
            ]);
        }
        if ($request->jenis_post == "Post") {
            return redirect('admin/post')->with(['sukses' => 'Data telah ditambah']);
        } else {
            return redirect('admin/post/jenis_post/' . $request->jenis_post)->with(['sukses' => 'Data telah ditambah']);
        }
    }

    // edit
    public function edit_proses(Request $request)
    {

        //proteksi halaman
        if (Session()->get('username') == "" || Session()->get('akses_level') == "User") { //jika username masih kosong, maka akan diarahkan ke halaman login
            $last_page = url()->full();
            return redirect('login?redirect=' . $last_page)->with(['warning' => 'Mohon maaf, Anda belum login.']);
        }
        //end proteksi halaman

        request()->validate([
            'judul_post'   => 'required',
            'isi'           => 'required',
            'gambar'        => 'file|image|mimes:jpeg,png,jpg|max:8024',
        ]);
        // UPLOAD START
        $image                  = $request->file('gambar');
        if (!empty($image)) {
            $filenamewithextension  = $request->file('gambar')->getClientOriginalName();
            $filename               = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input['nama_file']     = Str::slug($filename, '-') . '-' . time() . '.' . $image->getClientOriginalExtension();
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
            $slug_post = Str::slug($request->judul_post, '-');
            DB::table('post')->where('id_post', $request->id_post)->update([
                'id_kategori'       => $request->id_kategori,
                'id_user'           => Session()->get('id_user'),
                'slug_post'       => $slug_post,
                'judul_post'      => $request->judul_post,
                'isi'               => $request->isi,
                'jenis_post'      => $request->jenis_post,
                'status_post'     => $request->status_post,
                'gambar'            => $input['nama_file'],
                'icon'              => $request->icon,
                'keywords'          => $request->keywords,
                'tanggal_publish'   => date('Y-m-d', strtotime($request->tanggal_publish)) . ' ' . $request->jam_publish,
                'urutan'            => $request->urutan
            ]);
        } else {
            $slug_post = Str::slug($request->judul_post, '-');
            DB::table('post')->where('id_post', $request->id_post)->update([
                'id_kategori'       => $request->id_kategori,
                'id_user'           => Session()->get('id_user'),
                'slug_post'       => $slug_post,
                'judul_post'      => $request->judul_post,
                'isi'               => $request->isi,
                'jenis_post'      => $request->jenis_post,
                'status_post'     => $request->status_post,
                'icon'              => $request->icon,
                'keywords'          => $request->keywords,
                'tanggal_publish'   => date('Y-m-d', strtotime($request->tanggal_publish)) . ' ' . $request->jam_publish,
                'urutan'            => $request->urutan
            ]);
        }
        if ($request->jenis_post == "Post") {
            return redirect('admin/post')->with(['sukses' => 'Data telah diupdate']);
        } else {
            return redirect('admin/post/jenis_post/' . $request->jenis_post)->with(['sukses' => 'Data telah ditambah']);
        }
    }

    // Delete
    public function delete($id_post, $jenis_post)
    {

        //proteksi halaman
        if (Session()->get('username') == "" || Session()->get('akses_level') == "User") { //jika username masih kosong, maka akan diarahkan ke halaman login
            $last_page = url()->full();
            return redirect('login?redirect=' . $last_page)->with(['warning' => 'Mohon maaf, Anda belum login.']);
        }
        //end proteksi halaman

        DB::table('post')->where('id_post', $id_post)->delete();
        return redirect('admin/post/jenis_post/' . $jenis_post)->with(['sukses' => 'Data telah dihapus']);
    }
}
