<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function registerAccount(Request $request){
        $request->validate([
            '_token' => 'required',
            'name' => 'required',
            'regisNisn' => 'required|min:10|unique:tbl_users,nisn,except,id',
            'regisPassword' => 'required',
            'regisConfrimPw' => 'required',
        ]);

        try {
            DB::beginTransaction();

            DB::table('tbl_users')->insert([
                'nisn' => $request->regisNisn,
                'name' => $request->name,
                'role' => 3,
                'password'  => Hash::make($request->regisPassword),
                'created_at' => now()
            ]);

            DB::commit();
            return response()->json([
                'MSG' => 'S',
                'message' => 'Akun berhasil dibuat'
            ]);

        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'msg' => 'e',
                'message' => $th->getMessage(),
            ], 400);
        }
    }
}
