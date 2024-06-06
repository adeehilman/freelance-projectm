<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    public function index()
    {
        $sessionLogin = session('loggedInUser');
        $badge_id = $sessionLogin['session_badge'];
        $role = $sessionLogin['session_roles'];

        $getMenu = DB::select("SELECT * FROM tbl_menucards WHERE card_role = '$role'");

        $getmasterrole = DB::select('SELECT * FROM tbl_masterrole');

        $data = [
            'userInfo' => DB::table('tbl_users')->where('nisn', session('loggedInUser'))->first(),
            'menuItems' => $getMenu,
            'role' => $role,
            'listRole' => $getmasterrole,
            // 'userRole' => (int) session()->get('loggedInUser')['session_roles'],
            // 'positionName' => DB::table('tbl_rolemeeting')
            //     ->select('name')
            //     ->where('id', session()->get('loggedInUser')['session_roles'])
            //     ->first()->name,
        ];
        return view('akun.index', $data);
    }

    public function getList(Request $request)
    {
        $result = DB::select("SELECT u.nisn AS username, m.name AS role, u.role as role_id, u.password
            FROM tbl_users u
            INNER JOIN tbl_masterrole m ON u.role = m.id");

        $output = '';
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
                    <td class="p-3">' .
                $item->username .
                '</td>
                    <td class="p-3">' .
                $item->role .
                '</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-primary btnEdit" data-id=' .
                $item->username .
                ' data-username='. $item->username . ' data-role='. $item->role_id . ' data-password='.$item->password.'>Edit
                        </button>
                    </td>
                </tr>
            ';
        }

        $output .= '</tbody></table>';
        return $output;
    }

    public function insertAKun(Request $request)
    {
        // dd($request->all());

        $hashpassword = Hash::make($request->addPassword);
        // dd($hashpassword);
        try {
            $check = $this->checkduplicate($request->addUsername);
            if ($check) {
                return response()->json([
                'msg' => 'e',
                'message' => 'Data duplikat',
            ], 400);
            }
            DB::beginTransaction();

            DB::table('tbl_users')->insert([
                'name' => 'admin',
                'nisn' => $request->addUsername,
                'role' => $request->addRole,
                'password' => $hashpassword,
                'remember_token' => '',
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            DB::commit();

            return response()->json([
                'MSGTYPE' => 'S',
                'MSG' => 'OK.',
                'message' => 'Data succesfully Insert',
            ]);
        } catch (\Throwable $th) {
            throw $th;
            DB::rollback();
            return response()->json(
                [
                    'MSGTYPE' => 'W',
                    'MSG' => 'Something Went Wrong',
                ],
                400,
            );
        }
    }

    private function checkduplicate($nisn)
    {
        $nisn = DB::table('tbl_users')->where('nisn', $nisn)->first();

        if ($nisn) {
            return $nisn;
        } else {
            return false;
        }
    }

    public function editAkun(Request $request){

        // dd($request->all());
        if($request->editPassword == null){
            $pw = DB::table('tbl_users')->where('nisn', $request->idData)->first();
            // dd($pw);
            $hashpassword = $pw->password;
        }else{
            $hashpassword = Hash::make($request->editPassword);
        }
// dd($hashpassword);
        try {

            DB::beginTransaction();

            DB::table('tbl_users')->where('nisn', $request->idData)->update([
                'nisn' => $request->editUsername,
                'password' => $hashpassword,
                'role' => $request->editRole
            ]);

            DB::commit();

            return response()->json([
                'MSGTYPE' => 'S',
                'MSG' => 'OK.',
                'message' => 'Data succesfully Insert',
            ]);
        } catch (\Throwable $th) {
            // throw $th;

            DB::rollback();
            return response()->json(
                [
                    'MSGTYPE' => 'W',
                    'message' => $th->getMessage(),
                ],
                400,
            );
        }

    }
}
