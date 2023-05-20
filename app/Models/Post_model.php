<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post_model extends Model
{

    protected $table         = "post";
    protected $primaryKey     = 'id_post';

    // listing
    public function semua()
    {
        $query = DB::table('post')
            ->join('kategori', 'kategori.id_kategori', '=', 'post.id_kategori', 'LEFT')
            ->join('users', 'users.id_user', '=', 'post.id_user', 'LEFT')
            ->select('post.*', 'kategori.slug_kategori', 'kategori.nama_kategori', 'users.nama')
            ->orderBy('id_post', 'DESC')
            ->paginate(25);
        return $query;
    }

    // listing
    public function post_update()
    {
        $query = DB::table('post')
            ->join('kategori', 'kategori.id_kategori', '=', 'post.id_kategori', 'LEFT')
            ->join('users', 'users.id_user', '=', 'post.id_user', 'LEFT')
            ->where('jenis_post', 'Post')
            ->select('post.*', 'kategori.slug_kategori', 'kategori.nama_kategori', 'users.nama')
            ->orderBy('id_post', 'DESC')
            ->paginate(25);
        return $query;
    }

    // author
    public function author($id_user)
    {
        $query = DB::table('post')
            ->join('kategori', 'kategori.id_kategori', '=', 'post.id_kategori', 'LEFT')
            ->join('users', 'users.id_user', '=', 'post.id_user', 'LEFT')
            ->select('post.*', 'kategori.slug_kategori', 'kategori.nama_kategori', 'users.nama')
            ->where('post.id_user', $id_user)
            ->orderBy('id_post', 'DESC')
            ->paginate(25);
        return $query;
    }

    // listing
    public function cari($keywords)
    {
        $query = DB::table('post')
            ->join('kategori', 'kategori.id_kategori', '=', 'post.id_kategori', 'LEFT')
            ->join('users', 'users.id_user', '=', 'post.id_user', 'LEFT')
            ->select('post.*', 'kategori.slug_kategori', 'kategori.nama_kategori', 'users.nama')
            ->where('post.judul_post', 'LIKE', "%{$keywords}%")
            ->orWhere('post.isi', 'LIKE', "%{$keywords}%")
            ->orWhere('kategori.nama_kategori', 'LIKE', "%{$keywords}%")
            ->orderBy('id_post', 'DESC')
            ->paginate(25);
        return $query;
    }

    // kategori
    public function all_kategori($id_kategori)
    {
        $query = DB::table('post')
            ->join('kategori', 'kategori.id_kategori', '=', 'post.id_kategori', 'LEFT')
            ->join('users', 'users.id_user', '=', 'post.id_user', 'LEFT')
            ->select('post.*', 'kategori.slug_kategori', 'kategori.nama_kategori', 'users.nama')
            ->where(array('post.id_kategori'    => $id_kategori))
            ->orderBy('id_post', 'DESC')
            ->paginate(25);
        return $query;
    }

    // kategori
    public function status_post($status_post)
    {
        $query = DB::table('post')
            ->join('kategori', 'kategori.id_kategori', '=', 'post.id_kategori', 'LEFT')
            ->join('users', 'users.id_user', '=', 'post.id_user', 'LEFT')
            ->select('post.*', 'kategori.slug_kategori', 'kategori.nama_kategori', 'users.nama')
            ->where(array('post.status_post'         => $status_post))
            ->orderBy('id_post', 'DESC')
            ->paginate(25);
        return $query;
    }

    // kategori
    public function jenis_post($jenis_post)
    {
        $query = DB::table('post')
            ->join('kategori', 'kategori.id_kategori', '=', 'post.id_kategori', 'LEFT')
            ->join('users', 'users.id_user', '=', 'post.id_user', 'LEFT')
            ->select('post.*', 'kategori.slug_kategori', 'kategori.nama_kategori', 'users.nama')
            ->where(array('post.jenis_post'         => $jenis_post))
            ->orderBy('id_post', 'DESC')
            ->paginate(25);
        return $query;
    }

    // kategori
    public function kategori_depan($id_kategori, $paginate)
    {
        $query = DB::table('post')
            ->join('kategori', 'kategori.id_kategori', '=', 'post.id_kategori', 'LEFT')
            ->join('users', 'users.id_user', '=', 'post.id_user', 'LEFT')
            ->select('post.*', 'kategori.slug_kategori', 'kategori.nama_kategori', 'users.nama')
            ->where(array(
                'post.id_kategori'         => $id_kategori,
                'post.jenis_post'       => 'Post',
                'post.status_post'      => 'Publish'
            ))
            ->orderBy('id_post', 'DESC')
            ->paginate($paginate);
        return $query;
    }

    // listing
    public function listing($paginate, $status_post)
    {
        $query = DB::table('post')
            ->join('kategori', 'kategori.id_kategori', '=', 'post.id_kategori', 'LEFT')
            ->join('users', 'users.id_user', '=', 'post.id_user', 'LEFT')
            ->select('post.*', 'kategori.slug_kategori', 'kategori.nama_kategori', 'users.nama')
            ->where('post.status_post', $status_post)
            ->orderBy('id_post', 'DESC')
            ->paginate($paginate);
        return $query;
    }

    // listing
    public function home()
    {
        $query = DB::table('post')
            ->join('kategori', 'kategori.id_kategori', '=', 'post.id_kategori', 'LEFT')
            ->join('users', 'users.id_user', '=', 'post.id_user', 'LEFT')
            ->select('post.*', 'kategori.slug_kategori', 'kategori.nama_kategori', 'users.nama')
            ->where(array('post.status_post' => 'Publish', 'post.jenis_post' => 'Post'))
            ->orderBy('id_post', 'DESC')
            ->limit(3)
            ->get();
        return $query;
    }

    // detail
    public function read($slug_post)
    {
        $query = DB::table('post')
            ->join('kategori', 'kategori.id_kategori', '=', 'post.id_kategori', 'LEFT')
            ->join('users', 'users.id_user', '=', 'post.id_user', 'LEFT')
            ->select('post.*', 'kategori.slug_kategori', 'kategori.nama_kategori', 'users.nama')
            ->where('post.slug_post', $slug_post)
            ->orderBy('id_post', 'DESC')
            ->first();
        return $query;
    }

    // detail
    public function detail($id_post)
    {
        $query = DB::table('post')
            ->join('kategori', 'kategori.id_kategori', '=', 'post.id_kategori', 'LEFT')
            ->join('users', 'users.id_user', '=', 'post.id_user', 'LEFT')
            ->select('post.*', 'kategori.slug_kategori', 'kategori.nama_kategori', 'users.nama')
            ->where('post.id_post', $id_post)
            ->orderBy('id_post', 'DESC')
            ->first();
        return $query;
    }
}
