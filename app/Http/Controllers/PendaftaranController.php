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
        $getGelombang = DB::select('SELECT * FROM tbl_mastergelombang');
        $getJurusan = DB::select('SELECT * FROM tbl_masterjurusan');
        $getMasterTmpTinggal = DB::select('SELECT * FROM tbl_mastertempattinggal');

        $data = [
            'userInfo' => DB::table('tbl_users')->where('nisn', session('loggedInUser'))->first(),
            'menuItems' => $getMenu,
            'role' => $role,
            'list_gelombang' => $getGelombang,
            'list_jurusan' => $getJurusan,
            'list_mastertmpttinggal' => $getMasterTmpTinggal,
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
            $getCard = DB::select("SELECT *, a.id as idCard, b.nama_jurusan, b.color_label, a.jurusan_id,
            (SELECT nama_gelombang FROM tbl_mastergelombang c WHERE a.gelombang_id = c.id) as nama_gelombang
            FROM tbl_jalurpendaftaran a INNER JOIN tbl_masterjurusan b ON a.jurusan_id = b.id
            WHERE is_active = 1");

            foreach ($getCard as $key => $value) {
                # ambil total pendaftar
                $totaldaftar = DB::select("SELECT COUNT(*) as total FROM tbl_pendaftaransiswa WHERE jalurpendaftaran_id = $value->id");
            }

            return response()->json([
                'jalurdaftar' => $getCard,
                'totaldaftar' => $totaldaftar,
            ]);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function getEdit(Request $request)
    {
        try {
            $getCard = DB::select("SELECT *, a.id as idCard, b.nama_jurusan, b.color_label, a.jurusan_id, a.gelombang_id as gelombangId,
            (SELECT nama_gelombang FROM tbl_mastergelombang c WHERE a.gelombang_id = c.id) as nama_gelombang
            FROM tbl_jalurpendaftaran a INNER JOIN tbl_masterjurusan b ON a.jurusan_id = b.id
            WHERE a.id = $request->idCard");

            return response()->json($getCard[0]);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function insertjalur(Request $request)
    {
        dd($request->all());
        try {
            // $insert = DB::table('tbl_jalurpendaftaran')->insert([
            //     'nama_jalur' => $request->nama_jurusan
            // ]);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function update(Request $request)
    {

        // dd($request->all());
        $sessionLogin = session('loggedInUser');
        $nisn = $sessionLogin['session_badge'];
        $role = $sessionLogin['session_roles'];

        try {
            $idEdit = $request->idCard;
            DB::beginTransaction();
            DB::table('tbl_jalurpendaftaran')
                ->where('id', $idEdit)
                ->update([
                    'nama_jalur' => $request->EditnamaJalur,
                    'jurusan_id' => $request->jurusanEdit,
                    'tgl_mulai' => $request->ajaranAwalEdit,
                    'tgl_berakhir' => $request->akhirJalurEdit,
                    'gelombang_id' => $request->gelombangEdit,
                    'is_active' => $request->isactiveedit,
                    'updateby' => $nisn,
                    'updatedate' => date('Y-m-d H:i:s'),
                ]);

            DB::commit();

            return response()->json([
                'MSGTYPE' => 'S',
                'MSG' => 'OK.',
                'message' => 'Data succesfully Update',
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
        }
    }
}
