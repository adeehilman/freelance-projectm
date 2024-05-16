<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormPendaftaranController extends Controller
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
        return view('pendaftaran.form', $data);
    }

    public function getValue(Request $request){
        //TODO: lanjutkan form
    }

    public function insertjalur(Request $request){

        // dd($request->all());
        try {
            DB::beginTransaction();

            $insert = DB::table('tbl_jalurpendaftaran')->insert([
                'nama_jalur'   => $request->namaJalur,
                'jurusan_id'   => $request->jurusanAdd,
                'tgl_mulai'    => $request->ajaranAwal,
                'tgl_berakhir' => $request->akhirJalur,
                'gelombang_id' => $request->gelombangAdd,
                'is_active'    => 1,
            ]);

            DB::commit();

            return response()->json([
                'MSGTYPE' => 'S',
                'MSG' => 'OK.',
                'message' => 'Data succesfully Insert'
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'MSGTYPE' => 'W',
                'MSG' => 'Something Went Wrong',
            ], 400);
            dd($th);
        }
    }
}
