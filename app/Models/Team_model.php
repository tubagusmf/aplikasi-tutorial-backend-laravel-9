<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Team_model extends Model
{

    // listing
    public function listing()
    {
        $query = DB::table('users')
            ->select('*')
            ->orderBy('users.urutan', 'ASC')
            ->get();
        return $query;
    }
}
