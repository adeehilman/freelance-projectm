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


    public function index(Request $request){

        // $output .= '
        //     <table id="multi_col_order" class="table table-bordered table-hover align-middle text-nowrap">
        //     <thead class="table-light">
        //                     <tr>
        //                         <th>Jalur Pendaftaran</th>
        //                         <th>NISN</th>
        //                         <th>Virtual Account</th>
        //                         <th>Tahun Ajaran</th>
        //                         <th>Status Pembayaran</th>
        //                         <th>Status Registrasi</th>
        //                         <th>Detail</th>
        //                         <th>Aksi</th>

        //                     </tr>
        //                 </thead>
        //                 <tbody>
        // ';


        // foreach ($result as $key => $item) {

        //     $output .=
        //         '
        //         <tr>
        //             <td class="p-3">' .$item->nama_jalur .'</td>
        //             <td class="p-3">' .$item->nisn .'</td>
        //             <td class="p-3">' .$item->virtual_account .'</td>
        //             <td class="p-3">' .$item->tahunajaran .'</td>
        //             <td class="p-3 text-center text-'.$item->colorpayment.' fw-semibold">' .$item->nama_payment .'</td>
        //             <td class="p-3 text-center text-'.$item->regiscolor.' fw-semibold">' .$item->nama_registrasi .'</td>

        //             <td class="text-center">
        //                 <button type="button" class="btn btn-primary btnDetail" data-id=' .$item->idReg .' data-image='.$item->bukti_bayar.'>Lihat
        //                 </button>
        //             </td>
        //             <td class="text-center"><a type="button" href="'. url('/pendaftaran/form/edit/'.$item->idReg.'').'" class="btn btn-warning btnEdit" data-id=' .$item->idReg .' >
        //                                 Edit
        //                             </a>
        //                             <a type="button" href="'. url('/pendaftaran/form/edit/'.$item->idReg.'').'" class="btn btn-warning btnEdit" data-id=' .$item->idReg .' >
        //                                 Edit
        //                             </a></td>
        //         </tr>
        //     ';
        // }

        // $output .= '</tbody></table>';
        // return $output;
    }
}
