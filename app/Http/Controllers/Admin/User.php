<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User_model; //Manggil model yg dibuat
use Illuminate\Support\Facades\DB; //Load bawaan fungsi DB
use Illuminate\Support\Str;
use Image;

class User extends Controller
{
    //index
    public function index()
    {
        //proteksi halaman
        if (Session()->get('akses_level') == "User") { //jika akses_level masih kosong, maka akan diarahkan ke halaman login
            $last_page = url()->full();
            return redirect('login?redirect=' . $last_page)->with(['warning' => 'Mohon maaf, Anda belum login.']);
        }
        //end proteksi halaman

        $m_user = new User_model();
        $user = $m_user->listing();
        $data = [
            'title' => 'Data User',
            'user' => $user,
            'content' => 'admin/user/index'
        ];

        return view('admin/layout/wrapper', $data);
    }

    //tambah
    public function tambah()
    {
        //proteksi halaman
        if (Session()->get('akses_level') == "User") { //jika akses_level masih kosong, maka akan diarahkan ke halaman login
            $last_page = url()->full();
            return redirect('login?redirect=' . $last_page)->with(['warning' => 'Mohon maaf, Anda belum login.']);
        }
        //end proteksi halaman

        $data = [
            'title' => 'Tambah User',
            'content' => 'admin/user/tambah'
        ];

        return view('admin/layout/wrapper', $data);
    }

    //edit
    public function edit($id_user)
    {
        //proteksi halaman
        if (Session()->get('akses_level') == "User") { //jika akses_level masih kosong, maka akan diarahkan ke halaman login
            $last_page = url()->full();
            return redirect('login?redirect=' . $last_page)->with(['warning' => 'Mohon maaf, Anda belum login.']);
        }
        //end proteksi halaman

        $m_user = new User_model();
        $user = $m_user->detail($id_user);
        $data = [
            'title' => 'Edit User',
            'user' => $user,
            'content' => 'admin/user/edit'
        ];

        return view('admin/layout/wrapper', $data);
    }

    //proses_tambah
    public function proses_tambah(Request $request)
    {
        //proteksi halaman
        if (Session()->get('akses_level') == "User") { //jika akses_level user, maka tidak bisa login ke dasbor admin
            $last_page = url()->full();
            return redirect('login?redirect=' . $last_page)->with(['warning' => 'Mohon maaf, Anda belum login.']);
        }
        //end proteksi halaman

        request()->validate([
            'nama'  => 'required',
            'email' => 'required|unique:users', //users = table db users
            'username' => 'required|unique:users',
            'password' => 'required|min:5|max:32',
            'gambar' => 'file|image|mimes:jpeg,png,jpg|max:8024',
        ]);

        // UPLOAD START
        $image                          = $request->file('gambar');
        if (!empty($image)) {
            $filenamewithextension      = $request->file('gambar')->getClientOriginalName();
            $filename                   = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input['nama_file']            = Str::slug($filename, '-') . '-' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath            = './assets/upload/image/thumbs/';
            $img = Image::make($image->getRealPath(), array(
                'width'     => 150,
                'height'    => 150,
                'greyscale' => false
            ));
            $img->save($destinationPath . '/' . $input['nama_file']);
            $destinationPath = './assets/upload/image/';
            $image->move($destinationPath, $input['nama_file']);
            // END UPLOAD

            DB::table('users')->insert([
                'nama'  => $request->nama,
                'email'  => $request->email,
                'username'  => $request->username,
                'password'  => sha1($request->password),
                'akses_level'  => $request->akses_level,
                'urutan'  => $request->urutan,
                'pic'  => $request->pic,
                'whatsapp'  => $request->whatsapp,
                'gambar'  => $input['nama_file'],
                'tanggal'  => date('Y-m-d H:i:s')
            ]);
        } else {
            DB::table('users')->insert([
                'nama'  => $request->nama,
                'email'  => $request->email,
                'username'  => $request->username,
                'password'  => sha1($request->password),
                'akses_level'  => $request->akses_level,
                'urutan'  => $request->urutan,
                'pic'  => $request->pic,
                'whatsapp'  => $request->whatsapp,
                'tanggal'  => date('Y-m-d H:i:s')
            ]);
        }

        return redirect('admin/user')->with(['sukses' => "Data telah ditambah."]);
    }

    //proses_edit
    public function proses_edit(Request $request)
    {

        //proteksi halaman
        if (Session()->get('akses_level') == "User") { //jika akses_level user, maka tidak bisa login ke dasbor admin
            $last_page = url()->full();
            return redirect('login?redirect=' . $last_page)->with(['warning' => 'Mohon maaf, Anda belum login.']);
        }
        //end proteksi halaman

        request()->validate([
            'nama'  => 'required',
            'gambar' => 'file|image|mimes:jpeg,png,jpg|max:8024',
        ]);

        // UPLOAD START
        $image                          = $request->file('gambar');
        if (!empty($image)) {
            $filenamewithextension      = $request->file('gambar')->getClientOriginalName();
            $filename                   = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $input['nama_file']            = Str::slug($filename, '-') . '-' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath            = './assets/upload/image/thumbs/';
            $img = Image::make($image->getRealPath(), array(
                'width'     => 150,
                'height'    => 150,
                'greyscale' => false
            ));
            $img->save($destinationPath . '/' . $input['nama_file']);
            $destinationPath = './assets/upload/image/';
            $image->move($destinationPath, $input['nama_file']);
            // END UPLOAD

            DB::table('users')->where('id_user', $request->id_user)->update([
                'nama'  => $request->nama,
                'email'  => $request->email,
                'username'  => $request->username,
                'password'  => sha1($request->password),
                'akses_level'  => $request->akses_level,
                'urutan'  => $request->urutan,
                'pic'  => $request->pic,
                'whatsapp'  => $request->whatsapp,
                'gambar'  => $input['nama_file'],
                'tanggal'  => date('Y-m-d H:i:s')
            ]);
        } else {
            DB::table('users')->where('id_user', $request->id_user)->update([
                'nama'  => $request->nama,
                'email'  => $request->email,
                'username'  => $request->username,
                'password'  => sha1($request->password),
                'akses_level'  => $request->akses_level,
                'urutan'  => $request->urutan,
                'pic'  => $request->pic,
                'whatsapp'  => $request->whatsapp,
                'tanggal'  => date('Y-m-d H:i:s')
            ]);
        }

        return redirect('admin/user')->with(['sukses' => "Data telah diupdate."]);
    }

    //proses
    public function proses(Request $request)
    {
        //proteksi halaman
        if (Session()->get('akses_level') == "User") { //jika akses_level user, maka tidak bisa login ke dasbor admin
            $last_page = url()->full();
            return redirect('login?redirect=' . $last_page)->with(['warning' => 'Mohon maaf, Anda belum login.']);
        }
        //end proteksi halaman

        $id_user = $request->id_user;
        //chek kalau belum milih data
        if (empty($id_user)) {
            return redirect('admin/user')->with(['warning' => "Anda belum memilih user"]);
        }

        //proses
        if (isset($_POST['hapus'])) {
            //proses hapus user
            for ($i = 0; $i < sizeof($id_user); $i++) {
                DB::table('users')->where('id_user', $id_user[$i])->delete();
            }
            return redirect('admin/user')->with(['sukses' => "Data telah dihapus"]);
        } elseif (isset($_POST['update'])) {
            //proses update akses level user
            for ($i = 0; $i < sizeof($id_user); $i++) {
                DB::table('users')->where('id_user', $id_user[$i])->update([
                    'akses_level' => $request->akses_level
                ]);
            }
            return redirect('admin/user')->with(['sukses' => "Data telah diupdate"]);
        }
    }


    //delete
    public function delete($id_user)
    {
        //proteksi halaman
        if (Session()->get('akses_level') == "User") { //jika akses_level user, maka tidak bisa login ke dasbor admin
            $last_page = url()->full();
            return redirect('login?redirect=' . $last_page)->with(['warning' => 'Mohon maaf, Anda belum login.']);
        }
        //end proteksi halaman

        DB::table('users')->where('id_user', $id_user)->delete();
        return redirect('admin/user')->with(['sukses' => "Data user telah dihapus."]);
    }
}
