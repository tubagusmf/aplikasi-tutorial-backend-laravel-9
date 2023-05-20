<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Image;
use App\Models\Kategori_model;

class Kategori extends Controller
{
    // Index
    public function index()
    {

        ///proteksi halaman
        if (Session()->get('akses_level') == "User") { //jika akses_level user, maka tidak bisa login ke dasbor admin
            $last_page = url()->full();
            return redirect('login?redirect=' . $last_page)->with(['warning' => 'Mohon maaf, Anda belum login.']);
        }
        //end proteksi halaman

        // $kategori     = DB::table('kategori')->orderBy('urutan', 'ASC')->get();

        $m_kategori = new Kategori_model();
        $kategori = $m_kategori->listing();
        $data = array(
            'title'     => 'Data Kategori',
            'kategori'    => $kategori,
            'content'   => 'admin/kategori/index'
        );
        return view('admin/layout/wrapper', $data);
    }

    // tambah
    public function tambah(Request $request)
    {

        //proteksi halaman
        if (Session()->get('akses_level') == "User") { //jika akses_level user, maka tidak bisa login ke dasbor admin
            $last_page = url()->full();
            return redirect('login?redirect=' . $last_page)->with(['warning' => 'Mohon maaf, Anda belum login.']);
        }
        //end proteksi halaman

        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }

        $data = array(
            'title'             => 'Tambah Kategori',
            'content'           => 'admin/kategori/tambah'
        );
        return view('admin/layout/wrapper', $data);
    }

    // edit
    public function edit($id_kategori)
    {

        //proteksi halaman
        if (Session()->get('akses_level') == "User") { //jika akses_level user, maka tidak bisa login ke dasbor admin
            $last_page = url()->full();
            return redirect('login?redirect=' . $last_page)->with(['warning' => 'Mohon maaf, Anda belum login.']);
        }
        //end proteksi halaman

        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        $mykategori           = new Kategori_model();
        $kategori             = $mykategori->detail($id_kategori);

        $data = array(
            'title'             => 'Edit Kategori',
            'kategori'            => $kategori,
            'content'           => 'admin/kategori/edit'
        );
        return view('admin/layout/wrapper', $data);
    }

    // tambah_proses
    public function tambah_proses(Request $request)
    {

        //proteksi halaman
        if (Session()->get('akses_level') == "User") { //jika akses_level user, maka tidak bisa login ke dasbor admin
            $last_page = url()->full();
            return redirect('login?redirect=' . $last_page)->with(['warning' => 'Mohon maaf, Anda belum login.']);
        }
        //end proteksi halaman

        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        request()->validate([
            'nama_kategori'  => 'required|unique:kategori',
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
            $slug_kategori = Str::slug($request->nama_kategori, '-');
            DB::table('kategori')->insert([
                'id_user'       => Session()->get('id_user'),
                'nama_kategori' => $request->nama_kategori,
                'gambar'            => $input['nama_file'],
                'slug_kategori'    => $slug_kategori,
                'urutan'           => $request->urutan,
                'tanggal'      => date('Y-m-d H:i:s')
            ]);
        } else {
            $slug_kategori = Str::slug($request->nama_kategori, '-');
            DB::table('kategori')->insert([
                'id_user'       => Session()->get('id_user'),
                'nama_kategori' => $request->nama_kategori,
                'slug_kategori'    => $slug_kategori,
                'urutan'           => $request->urutan,
                'tanggal'      => date('Y-m-d H:i:s')
            ]);
        }

        return redirect('admin/kategori')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit_proses
    public function edit_proses(Request $request)
    {

        //proteksi halaman
        if (Session()->get('akses_level') == "User") { //jika akses_level user, maka tidak bisa login ke dasbor admin
            $last_page = url()->full();
            return redirect('login?redirect=' . $last_page)->with(['warning' => 'Mohon maaf, Anda belum login.']);
        }
        //end proteksi halaman

        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        request()->validate([
            'nama_kategori'   => 'required',
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
            $slug_kategori = Str::slug($request->nama_kategori, '-');
            DB::table('kategori')->where('id_kategori', $request->id_kategori)->update([
                'id_kategori'       => $request->id_kategori,
                'id_user'       => Session()->get('id_user'),
                'nama_kategori' => $request->nama_kategori,
                'gambar'            => $input['nama_file'],
                'slug_kategori'    => $slug_kategori,
                'urutan'           => $request->urutan
            ]);
        } else {
            $slug_kategori = Str::slug($request->nama_kategori, '-');
            DB::table('kategori')->where('id_kategori', $request->id_kategori)->update([
                'id_kategori'       => $request->id_kategori,
                'id_user'       => Session()->get('id_user'),
                'nama_kategori' => $request->nama_kategori,
                'slug_kategori'    => $slug_kategori,
                'urutan'           => $request->urutan
            ]);
        }

        return redirect('admin/kategori')->with(['sukses' => 'Data telah diupdate']);
    }

    // Delete
    public function delete($id_kategori)
    {
        //proteksi halaman
        if (Session()->get('akses_level') == "User") { //jika akses_level user, maka tidak bisa login ke dasbor admin
            $last_page = url()->full();
            return redirect('login?redirect=' . $last_page)->with(['warning' => 'Mohon maaf, Anda belum login.']);
        }
        //end proteksi halaman

        if (Session()->get('username') == "") {
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        DB::table('kategori')->where('id_kategori', $id_kategori)->delete();
        return redirect('admin/kategori')->with(['sukses' => 'Data telah dihapus']);
    }
}
