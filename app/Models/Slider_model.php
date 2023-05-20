<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Slider_model extends Model
{
    // use HasFactory;

    // listing
    public function listing()
    {
        $query = DB::table('slider_gambar')
            ->select('*')
            ->orderBy('slider_gambar.id_slider', 'DESC')
            ->get();
        return $query;
    }

    //detail
    public function detail($id_slider)
    {
        $query = DB::table('slider_gambar')
            ->select('*')
            ->where('id_slider', $id_slider)
            ->orderBy('slider_gambar.id_slider', 'DESC')
            ->first(); //untuk menampilkan 1 data
        return $query;
    }
}
