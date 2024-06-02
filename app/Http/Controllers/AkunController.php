<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AkunController extends Controller
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
        return view('akun.index', $data);
    }


    public function getList(Request $request){


        $result = DB::select("SELECT u.nisn AS username, m.name AS role FROM tbl_users u
                                INNER JOIN tbl_masterrole m
                                ON u.role = m.id
                                ");

        $output .= '
            <table id="multi_col_order" class="table table-bordered table-hover align-middle text-nowrap">
            <thead class="table-light">
                            <tr>
                                <th>User Name</th>
                                <th>Role</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
        ';


        foreach ($result as $key => $item) {

            $output .=
                '
                <tr>
                    <td class="p-3">' .$item->nisn .'</td>
                    <td class="p-3">' .$item->name .'</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-primary btnDetail" data-id=' .$item->idReg .' data-image='.$item->bukti_bayar.'>Lihat
                        </button>
                    </td>
                </tr>
            ';
        }

        $output .= '</tbody></table>';
        return $output;
    }
}
