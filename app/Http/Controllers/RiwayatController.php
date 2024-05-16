<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiwayatController extends Controller
{
    public function index(){
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
        return view('riwayat.index', $data);
    }

    public function getListData(Request $request){
        $sessionLogin = session('loggedInUser');
                $badge_id = $sessionLogin['session_badge'];
                $role = $sessionLogin['session_roles'];

        $result = DB::select("SELECT id, (SELECT nama_jalur FROM tbl_jalurpendaftaran e
                    WHERE e.id = a.jalurpendaftaran_id) AS jalurpendaftaran, nisn, virtual_account, tahunajaran,
                    (SELECT nama_payment FROM tbl_statuspayment b WHERE b.id = a.statusdaftar_id) AS namaregistrasi ,
                    (SELECT nama_registrasi FROM tbl_statusregistrasi d WHERE d.id = a.statusdaftar_id) AS namaregistrasi
                    FROM tbl_pendaftaransiswa a ");


        $output = '';
        $output .= '
            <table id="tblRiwayat" class="table table-responsive table-hover" style="font-size: 16px">
                <thead>
                    <tr style="color: #CD202E; height: 10px;" class="table-danger ">
                        <th class="p-3" scope="col">Room</th>
                        <th class="p-3" scope="col">Floor</th>
                        <th class="p-3" scope="col">Capacity</th>
                        <th class="p-3" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
        ';

        foreach ($result as $key => $item) {
            $output .=
                '
                <tr>
                    <td class="p-3">' .
                $item->room_name .
                '</td>
                    <td class="p-3">' .
                $item->floor .
                '</td>
                    <td class="p-3">' .
                $item->capacity .
                '</td>
                    <td>
                        <a  class="btn btnDetail" data-id=' .
                $item->id .
                '><img src="' .
                asset('icons/detail.svg') .
                '"></a>
                        <a  class="btn btnEdit" data-id=' .
                $item->id .
                '><img src="' .
                asset('icons/edit.svg') .
                '"></a>
                        <a class="btn btnDelete"  data-id="' .
                $item->id .
                '" data-room_name="' .
                $item->room_name .
                '"><img src="' .
                asset('icons/delete.svg') .
                '"></a>
                    </td>
                </tr>
            ';
        }

        $output .= '</tbody></table>';
        return $output;
    }
}
