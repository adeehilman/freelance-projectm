<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiwayatController extends Controller
{
    public function index()
    {
        $sessionLogin = session('loggedInUser');
        $badge_id = $sessionLogin['session_badge'];
        $role = $sessionLogin['session_roles'];

        $getMenu = DB::select("SELECT * FROM tbl_menucards WHERE card_role = '$role'");
        $statusregis = DB::select("SELECT * FROM tbl_statuspayment");

        $data = [
            'userInfo' => DB::table('tbl_users')->where('nisn', session('loggedInUser'))->first(),
            'menuItems' => $getMenu,
            'role' => $role,
            'list_statusregis' => $statusregis,
            // 'userRole' => (int) session()->get('loggedInUser')['session_roles'],
            // 'positionName' => DB::table('tbl_rolemeeting')
            //     ->select('name')
            //     ->where('id', session()->get('loggedInUser')['session_roles'])
            //     ->first()->name,
        ];
        return view('riwayat.index', $data);
    }

    public function getListData(Request $request)
    {
        $sessionLogin = session('loggedInUser');
        $nisn = $sessionLogin['session_badge'];
        $role = $sessionLogin['session_roles'];

        if($role == 1 || $role == 2){
            $code = "SELECT id FROM tbl_siswabaru a";
        }else{
            $code = "SELECT id FROM tbl_siswabaru a WHERE a.nisn = $nisn";
        }
        // // dd($nisn);
        $result = DB::select("SELECT ps.id as idReg, jp.nama_jalur, sb.nisn, ps.virtual_account, ps.tahunajaran,
        payment.color as colorpayment,
        regis.color as regiscolor,
        payment.nama_payment, regis.nama_registrasi, ps.bukti_bayar

        FROM tbl_pendaftaransiswa ps
        INNER JOIN tbl_siswabaru sb ON ps.siswa_id = sb.id
        INNER JOIN tbl_mastergelombang mg ON ps.gel_id = mg.id
        INNER JOIN tbl_jalurpendaftaran jp ON ps.jalurpendaftaran_id = jp.id
        INNER JOIN tbl_statuspayment payment ON payment.id = ps.payment_id
        INNER JOIN tbl_statusregistrasi regis ON regis.id = ps.statusdaftar_id
        WHERE siswa_id IN ($code)");

        $output = '';
        $output .= '
            <table id="multi_col_order" class="table table-bordered table-hover align-middle text-nowrap">
            <thead class="table-light">
                            <tr>
                                <th>Jalur Pendaftaran</th>
                                <th>NISN</th>
                                <th>Virtual Account</th>
                                <th>Tahun Ajaran</th>
                                <th>Status Pembayaran</th>
                                <th>Status Registrasi</th>
                                <th>Detail</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
        ';


        foreach ($result as $key => $item) {
            $acc = '';
            // 2 = TU  staff
            // 4 = bendahara

             if ($role == 1 || $role == 2 || $role == 4) {
                if ($item->nama_payment != 'Sudah bayar' && $item->nama_registrasi != 'Diterima') {
                    $acc = '
                            <button type="button" class="btn btn-success btnAcc mx-2" data-id="' .$item->idReg .'" data-image="' .$item->bukti_bayar.'">Accept</button>';
                }
                        }
            $output .=
                '
                <tr>
                    <td class="p-3">' .$item->nama_jalur .'</td>
                    <td class="p-3">' .$item->nisn .'</td>
                    <td class="p-3">' .$item->virtual_account .'</td>
                    <td class="p-3">' .$item->tahunajaran .'</td>
                    <td class="p-3 text-center text-'.$item->colorpayment.' fw-semibold">' .$item->nama_payment .'</td>
                    <td class="p-3 text-center text-'.$item->regiscolor.' fw-semibold">' .$item->nama_registrasi .'</td>

                    <td class="text-center">
                        <button type="button" class="btn btn-primary btnDetail" data-id=' .$item->idReg .' data-image='.$item->bukti_bayar.'>Lihat
                        </button>
                    </td>

                    <td class="text-center">
                        <a type="button" href="'. url('/pendaftaran/form/edit/'.$item->idReg.'').'" class="btn btn-warning btnEdit" data-id=' .$item->idReg .' >
                                        Edit
                                    </a>
                                    '.$acc
                        .'
                                   </td>

                </tr>
            ';
        }

        $output .= '</tbody></table>';
        return $output;

        // <a type="button" href="'. url('/pendaftaran/form/edit/'.$item->idReg.'').'" class="btn btn-warning btnEdit" data-id=' .$item->idReg .' >
        //                                 Edit
        //                             </a>
    }

    public function accRegis(Request $request){

        $request->validate([
            'addRole' => 'required'
        ]);

        // dd($request->all());
        try {

            DB::beginTransaction();
            DB::table("tbl_pendaftaransiswa")->where('id', $request->id)->update([
                'payment_id' => $request->addRole
            ]);

            DB::commit();
            return response()->json([
                'MSG' => 'S',
                'message' => 'Edit berhasil'
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            dd($th);
        }
    }
}
