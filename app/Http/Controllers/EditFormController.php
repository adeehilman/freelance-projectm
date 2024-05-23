<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EditFormController extends Controller
{
    public function index($idForm)
    {
        $sessionLogin = session('loggedInUser');
        $badge_id = $sessionLogin['session_badge'];
        $role = $sessionLogin['session_roles'];

        $getGelombang = DB::select('SELECT * FROM tbl_mastergelombang WHERE is_active = 1');
        $getJurusan = DB::select('SELECT * FROM tbl_masterjurusan');
        $getJalur = DB::select('SELECT * FROM tbl_jalurpendaftaran');

        $result = DB::select("SELECT ps.id AS idForm, jp.id AS idjalur,
        sb.*,
         rs.*,
          als.*,
           os.*,
            jp.*,
            sb.id as idSiswabaru,
            rs.id as idRiwayatSekolah,
            os.id as idOrtuSiswa,
            als.id as idAlamatSiswa,
        ps.bukti_bayar
        FROM tbl_pendaftaransiswa ps
            INNER JOIN tbl_siswabaru sb ON sb.id = ps.siswa_id
            INNER JOIN tbl_riwayatsekolah rs ON rs.siswa_id = sb.id
            INNER JOIN tbl_orangtuasiswa os ON os.siswa_id = sb.id
            INNER JOIN tbl_alamatsiswa als ON als.siswa_id = sb.id
            INNER JOIN tbl_jalurpendaftaran jp ON jp.id = ps.jalurpendaftaran_id
        WHERE ps.id = $idForm");
        $getMasterTmpTinggal = DB::select('SELECT * FROM tbl_mastertempattinggal');

        // dd($result);
        $getMenu = DB::select("SELECT * FROM tbl_menucards WHERE card_role = '$role'");
        $data = [
            'userInfo' => DB::table('tbl_users')->where('nisn', session('loggedInUser'))->first(),
            'menuItems' => $getMenu,
            'role' => $role,
            'valueForm' => $result[0],
            'list_gelombang' => $getGelombang,
            'list_jurusan' => $getJurusan,
            'list_jalur' => $getJalur,
            'list_mastertmpttinggal' => $getMasterTmpTinggal,
            // 'userRole' => (int) session()->get('loggedInUser')['session_roles'],
            // 'positionName' => DB::table('tbl_rolemeeting')
            //     ->select('name')
            //     ->where('id', session()->get('loggedInUser')['session_roles'])
            //     ->first()->name,
        ];
        return view('riwayat.formEdit', $data);
    }

    public function updateSiswa(Request $request)
    {
        // dd($request->alamatStatus);
        // dd($request->all());
        $fileBukti = $request->file('buktiBayarAdd') ?? null;

        $btnGender = $request->radioKelaminP ?? $request->radioKelaminL;
        try {
            DB::beginTransaction();

            $siswaId = DB::table('tbl_siswabaru')
                ->where('id', $request->idSiswabaru)
                ->update([
                    'nisn' => $request->noNISN,
                    'nama_lengkap' => $request->namaLengkap,
                    'nama_panggilan' => $request->namaPanggilan,
                    'jenis_kelamin' => $request->radiogender,
                    'tempat_lahir' => $request->tempatLahir,
                    'tanggal_lahir' => $request->tanggalLahirSiswa,
                    'agama' => $request->agamaAdd,
                    'kebutuhan_khusus' => $request->kebutuhanKhusus,
                    'saudara_kandung' => $request->saudaraKandung,
                    'saudara_tiri' => $request->saudaraTiri,
                    'saudara_angkat' => $request->saudaraAngkat,
                    'tinggi_badan' => $request->tinggiBadan,
                    'berat_badan' => $request->beratBadan,
                    'tahunajaran' => $request->tahunAJaran,
                    'updatedate' => now(),
                    'updateby' => $request->noNISN,
                ]);

            // TODO: ambil id id dari hidden input di foemdeditblade
            DB::table('tbl_riwayatsekolah')
            ->where('id', $request->idRiwayatSekolah)
            ->update([
                'no_sttb' => $request->sttbTahun,
                'no_ujian_smp' => $request->noUjian,
                'asal_sekolah' => $request->asalSekolah,
                'kegiatan_olahraga' => $request->radioOlahraga,
                'kegiatan_kesenian' => $request->radioKesenian,
                'prestasi' => $request->prestasiSMP,
            ]);

            DB::table('tbl_alamatsiswa')
            ->where('id', $request->idAlamatSiswa)
            ->update([
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

            DB::table('tbl_orangtuasiswa')
            ->where('id', $request->idOrtuSiswa)
            ->update([
                'nik' => $request->noNIK,
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
                'tgllahir_ayah' => $request->tanggalLahirAyah,
                'tgllahir_ibu' => $request->tanggalLahirIbu,
                'keadaan_ayah' => $request->radioAyah,
                'keadaan_ibu' => $request->radioIbu,
            ]);

            if ($fileBukti) {
                $namaFIle = $fileBukti->getClientOriginalName();
                $fileBukti->move(public_path('uploadBuktiBayar'), $namaFIle);
            }


            $oldata = DB::table('tbl_pendaftaransiswa')->where('id', $request->idForm)->first();
            $virtualacc = DB::table('tbl_va')->where('is_active', true)->first();
// dd($request->jalurEdit);
            DB::table('tbl_pendaftaransiswa')
            ->where('id', $request->idForm)
            ->update([
                'virtual_account' => $virtualacc->virtual_account,
                'jalurpendaftaran_id' => $request->jalurEdit,
                'gel_id' => $request->gelomhangAdd,
                'tahunajaran' => $request->tahunAJaran,
                'statusdaftar_id' => $oldata->statusdaftar_id,
                'payment_id' => $oldata->payment_id,
                'bukti_bayar' => $namaFIle ?? $oldata->bukti_bayar,
            ]);

            DB::commit();
            return response()->json([
                'MSG' => 'S',
                'message' => 'Pendaftaran berhasil'
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
