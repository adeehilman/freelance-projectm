<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormPendaftaranController extends Controller
{
    public function index($dataId){


        $sessionLogin = session('loggedInUser');
                $badge_id = $sessionLogin['session_badge'];
                $role = $sessionLogin['session_roles'];

                $getGelombang = DB::select("SELECT * FROM tbl_mastergelombang WHERE is_active = 1");
                $getJurusan = DB::select("SELECT * FROM tbl_masterjurusan");
                $getJalur = DB::select("SELECT * FROM tbl_jalurpendaftaran");

        $jalurInfo = DB::select("SELECT *, b.nama_jurusan, b.color_label, a.jurusan_id,
            (SELECT nama_gelombang FROM tbl_mastergelombang c WHERE a.gelombang_id = c.id) as nama_gelombang
            FROM tbl_jalurpendaftaran a INNER JOIN tbl_masterjurusan b ON a.jurusan_id = b.id WHERE a.id = '$dataId'");

        $getMenu = DB::select("SELECT * FROM tbl_menucards WHERE card_role = '$role'");
        $data = [
            'userInfo' => DB::table('tbl_users')
                ->where('nisn', session('loggedInUser'))
                ->first(),
            'menuItems' => $getMenu,
            'role'     => $role,
            'jalur' => $jalurInfo[0]->id,
            'nama_jalur' => $jalurInfo[0]->nama_jalur,
            'jurusan' => $jalurInfo[0]->jurusan_id,
            'gelombang' => $jalurInfo[0]->gelombang_id,
            'list_gelombang' => $getGelombang,
            'list_jurusan' => $getJurusan,
            'list_jalur'  => $getJalur,
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

    public function insertSiswa(Request $request){

        $request->validate([
            'namaLengkap' => 'required',
            'radiogender' => 'required',
            'namaPanggilan' => 'nullable',
            'agamaAdd' => 'required',
            'tempatLahir' => 'required',
            'tinggiBadan' => 'required',
            'beratBadan' => 'required',
            'kebutuhanKhusus' => 'nullable',
            'saudaraKandung' => 'required',
            'saudaraTiri' => 'required',
            'saudaraAngkat' => 'required',
            'sttbTahun' => 'required',
            'noNISN' => 'required',
            'noUjian' => 'required',
            'asalSekolah' => 'required',
            'alamatRumah' => 'required',
            'rtRumah' => 'required',
            'rwRumah' => 'required',
            'kodePos' => 'required',
            'KelurahanRumah' => 'required',
            'kecamatanRumah' => 'required',
            'kotaRumah' => 'required',
            'provRumah' => 'required',
            'alamatNoTelp' => 'required',
            'alamatNoHp' => 'required',
            'alamatEmail' => 'required|email',
            'alamatStatus' => 'required',
            'jarakRumah' => 'nullable',
            'alatTransportasi' => 'nullable',
            'noNIK' => 'required',
            'namaAyah' => 'required',
            'namaIbu' => 'required',
            'pekerjaanAyah' => 'required',
            'pekerjaanIbu' => 'required',
            'penghasilanAyah' => 'required',
            'penghasilanIbu' => 'required',
            'pendidikanAyah' => 'required',
            'pendidikanIbu' => 'required',
            'alamatOrtu' => 'required',
            'rtRumahOrtu' => 'required',
            'rwRumahOrtu' => 'required',
            'kodePosOrtu' => 'required',
            'KelurahanRumahOrtu' => 'required',
            'kecamatanRumahOrtu' => 'required',
            'kotaRumahOrtu' => 'required',
            'provRumahOrtu' => 'required',
            'alamatNoTelpOrtu' => 'required',
            'alamatNoHpOrtu' => 'required',
            'jurusanAdd' => 'required',
            'gelomhangAdd' => 'required',
            'jalurId' => 'required',
            'jalurAdd' => 'required',
            'tahunAJaran' => 'required',
            // Aturan validasi lainnya
        ]);

        $fileBukti = $request->file('buktiBayarAdd');
        $namaFIle = $fileBukti->getClientOriginalName();
        $btnGender = $request->radioKelaminP ?? $request->radioKelaminL;

        try {
            DB::beginTransaction();
            // TODO: insert ortu keadaan, ortu tanggallahir, tahunajaran
            $siswaId = DB::table('tbl_siswabaru')->insertGetId([
                'nisn'  => $request->noNISN,
                'nama_lengkap'  => $request->namaLengkap,
                'nama_panggilan'  => $request->namaPanggilan,
                'jenis_kelamin'  => $request->radiogender,
                'tempat_lahir'  => $request->tempatLahir,
                'tanggal_lahir'  => $request->tanggalLahirSiswa,
                'agama'  => $request->agamaAdd,
                'kebutuhan_khusus'  => $request->kebutuhanKhusus,
                'saudara_kandung'  => $request->saudaraKandung,
                'saudara_tiri'  => $request->saudaraTiri,
                'saudara_angkat'  => $request->saudaraAngkat,
                'tinggi_badan'  => $request->tinggiBadan,
                'berat_badan'  => $request->beratBadan,
                'createdate'  => now(),
                'createby'  => $request->noNISN,
            ]);

            DB::table('tbl_riwayatsekolah')->insert([
                'siswa_id' => $siswaId,
                'no_sttb' => $request->sttbTahun,
                'no_ujian_smp' => $request->noUjian,
                'asal_sekolah' => $request->asalSekolah,
                'kegiatan_olahraga' => $request->radioOlahraga,
                'kegiatan_kesenian' => $request->radioKesenian,
                'prestasi' => $request->prestasiSMP,
            ]);

            DB::table('tbl_alamatsiswa')->insert([
                'siswa_id' => $siswaId,
                'alamat' => $request->alamatRumah,
                'rt' => $request->rtRumah,
                'rw' => $request->rwRumah,
                'kode_pos' => $request->kodePos,
                'kelurahan' => $request->KelurahanRumah,
                'kecamatan' => $request->kecamatanRumah,
                'kota' => $request->kotaRumah,
                'provinsi' => $request->provRumah,
                'no_telepon' => $request->alamatNoTelp,
                'no_hp' => $request->alamatNoHp,
                'email' => $request->alamatEmail,
                'status_rumah' => $request->alamatStatus,
                'jarakdarirumah' => $request->jarakRumah,
                'transportasi' => $request->alatTransportasi,
            ]);

            DB::table('tbl_orangtuasiswa')->insert([
                'siswa_id' => $siswaId,
                'nik'       => $request->noNIK,
                'nama_ayah' => $request->namaAyah,
                'pendidikan_ayah' => $request->pendidikanAyah,
                'pekerjaan_ayah' => $request->pekerjaanAyah,
                'penghasilan_ayah' => $request->penghasilanAyah,
                'no_hp_ortu' => $request->alamatNoHpOrtu,
                'nama_ibu' => $request->namaIbu,
                'pendidikan_ibu' => $request->pendidikanIbu,
                'pekerjaan_ibu' => $request->pekerjaanIbu,
                'penghasilan_ibu' => $request->penghasilanIbu,
                'no_telepon_ortu' => $request->alamatNoTelpOrtu,
                'alamat_ortu' => $request->alamatOrtu,
                'rt_ortu' => $request->rtRumahOrtu,
                'rw_ortu' => $request->rwRumahOrtu,
                'kode_pos_ortu' => $request->kodePosOrtu,
                'kelurahan_ortu' => $request->KelurahanRumahOrtu,
                'kecamatan_ortu' => $request->kecamatanRumahOrtu,
                'kota_ortu' => $request->kotaRumahOrtu,
                'provinsi_ortu' => $request->provRumahOrtu,
            ]);

            DB::table('tbl_pendaftaransiswa')->insert([
                'siswa_id'  => $siswaId,
                'virtual_account'  => $request->noNISN,
                'jalurpendaftaran_id'  => $request->jalurId,
                'gel_id'  => $request->gelomhangAdd,
                'tahunajaran'  => $request->tahunAJaran,
                'statusdaftar_id'  => 1,
                'payment_id'  => 1,
                'bukti_bayar'  => $namaFIle,
            ]);

            if ($namaFIle) {
                $fileBukti->move(public_path('uploadBuktiBayar'), $namaFIle);
            }

            DB::commit();
            return response()->json([
                'MSG' => 'S',
                'message' => 'Pendaftaran berhasil'
            ]);

        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return response()->json([
                'msg' => 'e',
                'message' => $th->getMessage(),
            ], 400);
        }
    }
}
