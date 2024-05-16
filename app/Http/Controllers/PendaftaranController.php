<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendaftaranController extends Controller
{
    public function index()
    {
        $sessionLogin = session('loggedInUser');
                $badge_id = $sessionLogin['session_badge'];
                $role = $sessionLogin['session_roles'];


        $getMenu = DB::select("SELECT * FROM tbl_menucards WHERE card_role = '$role'");
        $getGelombang = DB::select("SELECT * FROM tbl_mastergelombang WHERE is_active = 1");
        $getJurusan = DB::select("SELECT * FROM tbl_masterjurusan");

        $data = [
            'userInfo' => DB::table('tbl_users')
                ->where('nisn', session('loggedInUser'))
                ->first(),
            'menuItems' => $getMenu,
            'role'     => $role,
            'list_gelombang' => $getGelombang,
            'list_jurusan' => $getJurusan,
            // 'userRole' => (int) session()->get('loggedInUser')['session_roles'],
            // 'positionName' => DB::table('tbl_rolemeeting')
            //     ->select('name')
            //     ->where('id', session()->get('loggedInUser')['session_roles'])
            //     ->first()->name,
        ];
        return view('pendaftaran.index', $data);
    }

    public function getList(Request $request)
    {
        try {
            $getCard = DB::select("SELECT *, b.nama_jurusan, b.color_label, a.jurusan_id,
            (SELECT nama_gelombang FROM tbl_mastergelombang c WHERE a.gelombang_id = c.id) as nama_gelombang
            FROM tbl_jalurpendaftaran a INNER JOIN tbl_masterjurusan b ON a.jurusan_id = b.id WHERE is_active = '1' ");


            return response()->json($getCard);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function insertjalur(Request $request){

        dd($request->all());
        try {
            // $insert = DB::table('tbl_jalurpendaftaran')->insert([
            //     'nama_jalur' => $request->nama_jurusan
            // ]);

        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
