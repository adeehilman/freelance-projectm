<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth/index');
    }

    public function login(Request $request)
    {
        // dd($request->all());
        // $badge = $request->post('badge');
        // $dataUser = DB::table('tbl_user')->where('badge', $badge)->first();

        // return response()->json([
        //     'status' => 200,
        //     'data' => $dataUser
        // ]);

        // $hashedPassword = bcrypt($request->password);
        // dd($hashedPassword);
        $nisn = $request->post('nisn');
        // dd($nisn);
        if (!$nisn) {
            return response()->json([
                'status' => 400,
                'messages' => 'Wrong Password',
            ]);
        } else {


            $password = $request->password;
            $dataUser = DB::table('tbl_users')
                ->where('nisn', $nisn)
                ->first();

            if ($dataUser) {
                $userPassword = $dataUser->password;
                $validPassword = Hash::check($password, $userPassword);
                if ($validPassword) {
                    $request->session()->put('loggedInUser', ['session_badge' => $dataUser->nisn, 'session_roles' => $dataUser->role]);
                    return response()->json([
                        'status' => 200,
                        'messages' => 'Login successful',
                        'role' => $dataUser->role,
                    ]);
                } else {
                    return response()->json([
                        'status' => 401,
                        'messages' => 'Wrong Password',
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 401,
                    'messages' => 'Akun belum terdaftar',
                ]);
            }
        }
    }

    public function logout()
    {
        if (session()->has('loggedInUser')) {
            session()->pull('loggedInUser');
            return redirect('/');
        }
    }
}
