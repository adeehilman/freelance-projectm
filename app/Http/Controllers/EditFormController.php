<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class EditFormController extends Controller
{
    public function index()
    {
        $sessionLogin = session('loggedInUser');
        $badge_id = $sessionLogin['session_badge'];
        $role = $sessionLogin['session_roles'];


        $getMenu = DB::select("SELECT * FROM tbl_menucards WHERE card_role = '$role'");
        $data = [
            'userInfo' => DB::table('tbl_users')
                ->where('nisn', session('loggedInUser'))
                ->first(),
            'menuItems' => $getMenu,
            'role'     => $role,
            // 'userRole' => (int) session()->get('loggedInUser')['session_roles'],
            // 'positionName' => DB::table('tbl_rolemeeting')
            //     ->select('name')
            //     ->where('id', session()->get('loggedInUser')['session_roles'])
            //     ->first()->name,
        ];
        return view('riwayat.formEdit', $data);
    }
}
