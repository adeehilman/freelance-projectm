<?php

namespace App\Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class myHelpers
{
    public static function getMenuItems($role)
    {
        $getMenu = DB::select("SELECT * FROM tbl_menucards WHERE card_role = '$role'");
        return $getMenu; // Sesuaikan dengan query Anda
    }
}
