<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Image;
use App\Models\Slider_model;

class Slider extends Controller
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

        // $slider     = DB::table('slider')->orderBy('urutan', 'ASC')->get();

        $m_slider = new Slider_model();
        $slider = $m_slider->listing();
        $data = array(
            'title'     => 'Data Slider Gambar',
            'slider'    => $slider,
            'content'   => 'admin/slider/index'
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

        $data = array(
            'title'             => 'Tambah Slider Gambar',
            'content'           => 'admin/slider/tambah'
        );
        return view('admin/layout/wrapper', $data);
    }

    // edit
    public function edit($id_slider)
    {

        //proteksi halaman
        if (Session()->get('akses_level') == "User") { //jika akses_level user, maka tidak bisa login ke dasbor admin
            $last_page = url()->full();
            return redirect('login?redirect=' . $last_page)->with(['warning' => 'Mohon maaf, Anda belum login.']);
        }
        //end proteksi halaman

        $myslider           = new Slider_model();
        $slider             = $myslider->detail($id_slider);

        $data = array(
            'title'             => 'Edit Slider',
            'slider'            => $slider,
            'content'           => 'admin/slider/edit'
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

        request()->validate([
            'nama_slider'  => 'required',
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
            DB::table('slider_gambar')->insert([
                'id_user'       => Session()->get('id_user'),
                'nama_slider' => $request->nama_slider,
                'keterangan' => $request->keterangan,
                'gambar'            => $input['nama_file'],
                'tanggal'      => date('Y-m-d H:i:s')
            ]);
        } else {
            DB::table('slider_gambar')->insert([
                'id_user'       => Session()->get('id_user'),
                'nama_slider' => $request->nama_slider,
                'keterangan' => $request->keterangan,
                'tanggal'      => date('Y-m-d H:i:s')
            ]);
        }

        return redirect('admin/slider')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function edit_proses(Request $request)
    {

        //proteksi halaman
        if (Session()->get('akses_level') == "User") { //jika akses_level user, maka tidak bisa login ke dasbor admin
            $last_page = url()->full();
            return redirect('login?redirect=' . $last_page)->with(['warning' => 'Mohon maaf, Anda belum login.']);
        }
        //end proteksi halaman

        request()->validate([
            'nama_slider'   => 'required',
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
            DB::table('slider_gambar')->where('id_slider', $request->id_slider)->update([
                'id_user'       => Session()->get('id_user'),
                'nama_slider' => $request->nama_slider,
                'keterangan' => $request->keterangan,
                'gambar'            => $input['nama_file'],
                'tanggal'      => date('Y-m-d H:i:s')
            ]);
        } else {
            DB::table('slider_gambar')->where('id_slider', $request->id_slider)->update([
                'id_user'       => Session()->get('id_user'),
                'nama_slider' => $request->nama_slider,
                'keterangan' => $request->keterangan,
                'tanggal'      => date('Y-m-d H:i:s')
            ]);
        }

        return redirect('admin/slider')->with(['sukses' => 'Data telah diupdate']);
    }

    // Delete
    public function delete($id_slider)
    {

        //proteksi halaman
        if (Session()->get('akses_level') == "User") { //jika akses_level user, maka tidak bisa login ke dasbor admin
            $last_page = url()->full();
            return redirect('login?redirect=' . $last_page)->with(['warning' => 'Mohon maaf, Anda belum login.']);
        }
        //end proteksi halaman

        DB::table('slider_gambar')->where('id_slider', $id_slider)->delete();
        return redirect('admin/slider')->with(['sukses' => 'Data telah dihapus']);
    }
}
