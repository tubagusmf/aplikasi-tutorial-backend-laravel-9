<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kategori_model extends Model
{
    // use HasFactory;

    // listing
    public function listing()
    {
        $query = DB::table('kategori')
            ->select('*')
            ->orderBy('kategori.id_kategori', 'DESC')
            ->get();
        return $query;
    }

    //detail
    public function detail($id_kategori)
    {
        $query = DB::table('kategori')
            ->select('*')
            ->where('id_kategori', $id_kategori)
            ->orderBy('kategori.id_kategori', 'DESC')
            ->first(); //untuk menampilkan 1 data
        return $query;
    }
}
