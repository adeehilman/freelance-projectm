@extends('layouts.main')
@section('title', ' Edit Form Pendaftaran Siswa')


@section('content')
    <div class="container-fluid">
        <div class="card shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Edit Form Pendaftaran</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="./index.html">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Edit Form Pendaftaran</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img src="{{ asset('images/breadcrumb/ChatBc.png') }}" alt="" class="img-fluid mb-n4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section height="auto">
            <div class="row">
                <div class="col-12">
                    {{-- form with validation --}}
                    <div class="card">
                        <div class="card-body wizard-content">
                            <h4 class="card-title">Biodata diri</h4>
                            <p class="card-subtitle mb-6 text-danger"> *wajib diisi</p>
                            <form action="#" class="validation-wizard wizard-circle">
                                <!-- Step 1 -->
                                <h6>Step 1</h6>
                                <section>
                                    <label class="align-items-center mb-4 mt-3">Data Diri</label>
                                    <div class="row d-flex  align-items-center mb-3">
                                        <div class="col-2">
                                            <label for="namaLengkap" class="form-label align-items-center">Nama
                                                Lengkap<danger class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-4">
                                            <input type="text" class="form-control required" id="namaLengkap"
                                                name="namaLengkap" aria-describedby="emailHelp"
                                                style="text-transform:uppercase" value="John Doe" required>
                                        </div>
                                        <div class="col-2">
                                            <label for="namaPanggilan" class="form-label align-items-center">Nama
                                                Panggilan (Opsional)</label>
                                        </div>
                                        <div class="col-4">
                                            <input type="text" class="form-control" id="namaPanggilan"
                                                name="namaPanggilan" aria-describedby="emailHelp"
                                                style="text-transform:uppercase" value="John">
                                        </div>
                                    </div>
                                    <div class="row d-flex  align-items-center mb-3">
                                        <div class="col-md-2">
                                            <label for="jenisKelamin" class="form-label align-items-center">Jenis
                                                Kelamin<danger class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-md-4 d-flex align-items-center gap-3">
                                            <div class="form-check required">
                                                <input class="form-check-input" type="radio" name="radioKelamin"
                                                    id="radioLaki" checked>
                                                <label class="form-check-label" for="radioLaki">
                                                    Laki-laki
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioKelamin"
                                                    id="radioPerempuan">
                                                <label class="form-check-label" for="radioPerempuan">
                                                    Perempuan
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="exampleInputEmail1" class="form-label align-items-center">Agama
                                                <danger class="text-danger">*</danger>
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-select" id="genderAdd" name="genderAdd"
                                                data-placeholder="Pilih Agama">
                                                <option value="islam" selected>Islam</option>
                                                <option value="kristen">Kristen</option>
                                                <option value="katolik">Katolik</option>
                                                <option value="hindu">Hindu</option>
                                                <option value="budha">Budha</option>
                                                <option value="konghucu">Konghucu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row d-flex  align-items-center mb-3">
                                        <div class="col-md-2">
                                            <label for="tempatLahir" class="form-label align-items-center">Tempat
                                                Lahir<danger class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control required" id="tempatLahir"
                                                name="tempatLahir" aria-describedby="emailHelp" value="Batam" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="tanggalLahir" class="form-label align-items-center">Tanggal
                                                Lahir<danger class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="date" class="form-control required" id="tanggalLahirSiswa"
                                                value="today" />
                                        </div>
                                    </div>
                                    <div class="row d-flex  align-items-center mb-3">
                                        <div class="col-md-2">
                                            <label for="tinggiBadan" class="form-label align-items-center">Tinggi
                                                Badan<danger class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" class="form-control required" id="tinggiBadan"
                                                name="tinggiBadan" aria-describedby="emailHelp" value="175" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="beratBadang" class="form-label align-items-center">Berat
                                                badan<danger class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" class="form-control required" id="beratBadan"
                                                name="beratBadan" aria-describedby="emailHelp" value="70" required>
                                        </div>
                                    </div>
                                    <div class="row d-flex  align-items-center mb-3">
                                        <div class="col-md-2">
                                            <label for="kebutuhanKhusus"
                                                class="form-label align-items-center">Berkebutuhan khusus</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="kebutuhanKhusus"
                                                name="kebutuhanKhusus" aria-describedby="emailHelp"
                                                placeholder="Isi jika ada" value="Tidak berkebutuhan khusus">
                                        </div>
                                    </div>
                                    <div class="row  align-items-center mb-3">
                                        <div class="col-md-2">
                                            <label for="saudaraKandung" class="form-label align-items-center">Saudara
                                                Kandung<danger class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" class="form-control required" id="saudaraKandung"
                                                name="saudaraKandung" aria-describedby="emailHelp" value="2"
                                                required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="saudaraTiri" class="form-label align-items-center">Saudara Tiri
                                                <danger class="text-danger">*</danger>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" class="form-control required" id="saudaraTiri"
                                                name="saudaraTiri" aria-describedby="emailHelp" value="0" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="saudaraAngkat" class="form-label align-items-center">Saudara
                                                Angkat<danger class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" class="form-control required" id="saudaraAngkat"
                                                name="saudaraAngkat" aria-describedby="emailHelp" value="0"
                                                required>
                                        </div>
                                    </div>


                                    {{-- TODO: Ambil dari data dinamis --}}
                                    <label class="mb-4 mt-5">Riwayat Sekolah </label>
                                    <div class="row d-flex  align-items-center mb-3">
                                        <div class="col-md-2">
                                            <label for="sttbTahun" class="form-label align-items-center">No. STTB dan
                                                Tahun<danger class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="sttbTahun" name="sttbTahun"
                                                aria-describedby="emailHelp" value="1234567890" required>
                                        </div>
                                    </div>
                                    <div class="row d-flex  align-items-center mb-3">
                                        <div class="col-md-2">
                                            <label for="noNISN" class="form-label align-items-center">No. NISN<danger
                                                    class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="noNISN" name="noNISN"
                                                aria-describedby="emailHelp" value="1234567890" required>
                                        </div>
                                    </div>
                                    <div class="row d-flex  align-items-center mb-3">
                                        <div class="col-md-2">
                                            <label for="noUjian" class="form-label align-items-center">No. Peserta Ujian
                                                UN SMP<danger class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="noUjian" name="noUjian"
                                                aria-describedby="emailHelp" value="1234567890" required>
                                        </div>
                                    </div>
                                    <div class="row d-flex  align-items-center mb-3">
                                        <div class="col-md-2">
                                            <label for="asalSekolah" class="form-label align-items-center">Asal Sekolah
                                                <danger class="text-danger">*</danger>
                                            </label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="asalSekolah"
                                                name="asalSekolah" aria-describedby="emailHelp" value="SMPN 1 New York"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row d-flex  align-items-center mb-3">
                                        <div class="col-md-2">
                                            <label for="kegiatanOlahraga" class="form-label align-items-center">Kegiatan
                                                Olah Raga<danger class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-md-10 d-flex align-items-center gap-3">
                                            <div class="form-check required">
                                                <input class="form-check-input" type="radio" name="radioOlahraga"
                                                    id="radioOlahAktif" checked>
                                                <label class="form-check-label" for="radioOlahAktif">
                                                    Aktif
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioOlahraga"
                                                    id="radioOlahCukup">
                                                <label class="form-check-label" for="radioOlahCukup">
                                                    Cukup
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioOlahraga"
                                                    id="radioOlahurang">
                                                <label class="form-check-label" for="radioOlahurang">
                                                    Kurang
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-flex  align-items-center mb-3">
                                        <div class="col-md-2">
                                            <label for="kegiatanKesenian" class="form-label align-items-center">Kegiatan
                                                Kesenian<danger class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-md-10 d-flex align-items-center gap-3">
                                            <div class="form-check required">
                                                <input class="form-check-input" type="radio" name="radioKesenian"
                                                    id="radioSeniAktif" checked>
                                                <label class="form-check-label" for="radioSeniAktif">
                                                    Aktif
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioKesenian"
                                                    id="radioSeniCukup">
                                                <label class="form-check-label" for="radioSeniCukup">
                                                    Cukup
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioKesenian"
                                                    id="radioSeniKurang">
                                                <label class="form-check-label" for="radioSeniKurang">
                                                    Kurang
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-flex  align-items-center mb-3">
                                        <div class="col-md-2">
                                            <label for="prestasiSMP" class="form-label align-items-center">Prestasi selama
                                                SMP/MTS</label>
                                        </div>
                                        <div class="col-md-10">
                                            <textarea class="form-control" id="prestasiSMP" rows="3">Juara 1 Lomba Matematika, Juara 1 Lomba Fisika, Juara 1 Lomba Kimia, Juara 1 Lomba Pemanfaatan Energi Nuklir</textarea>
                                        </div>
                                    </div>
                                </section>

                                <!-- Step 2 -->
                                <h6>Step 2</h6>
                                <section>
                                    <label class="align-items-center mb-4 mt-3">Alamat</label>
                                    <div class="row d-flex  align-items-center mb-3">
                                        <div class="col-2">
                                            <label for="alamatRumah" class="form-label align-items-center">Alamat Rumah
                                                <danger class="text-danger">*</danger>
                                            </label>
                                        </div>
                                        <div class="col-10">
                                            <input type="text" class="form-control required" id="alamatRumah"
                                                name="alamatRumah" aria-describedby="emailHelp"
                                                value="Beverly Hills San Diego" required>
                                        </div>
                                    </div>
                                    <div class="row d-flex  align-items-center mb-3">
                                        <div class="col-md-2">
                                            <label for="rtRumah" class="form-label align-items-center">RT<danger
                                                    class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" class="form-control required" id="rtRumah"
                                                name="rtRumah" aria-describedby="emailHelp" value="01" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="rwRumah" class="form-label align-items-center">RW<danger
                                                    class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" class="form-control required" id="rwRumah"
                                                name="rwRumah" aria-describedby="emailHelp" value="05" required>
                                        </div>
                                    </div>
                                    <div class="row d-flex  align-items-center mb-3">
                                        <div class="col-2">
                                            <label for="kodePos" class="form-label align-items-center">Kode Pos<danger
                                                    class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-10">
                                            <input type="number" class="form-control required" id="kodePos"
                                                name="kodePos" aria-describedby="emailHelp" value="900990" required>
                                        </div>
                                    </div>
                                    <div class="row d-flex  align-items-center mb-3">
                                        <div class="col-md-2">
                                            <label for="KelurahanRumah" class="form-label align-items-center">Kelurahan
                                                <danger class="text-danger">*</danger>
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control required" id="KelurahanRumah"
                                                name="KelurahanRumah" aria-describedby="emailHelp" value="San Martin 1"
                                                required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="KecamatanRumah" class="form-label align-items-center">Kecamatan
                                                <danger class="text-danger">*</danger>
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control required" id="kecamatanRumah"
                                                name="kecamatanRumah" aria-describedby="emailHelp"
                                                value="San Martin Pusat" required>
                                        </div>
                                    </div>
                                    <div class="row d-flex  align-items-center mb-3">
                                        <div class="col-md-2">
                                            <label for="kotaRumah" class="form-label align-items-center">Kota/Kab.<danger
                                                    class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control required" id="kotaRumah"
                                                name="kotaRumah" aria-describedby="emailHelp" value="San Diego" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="provRumah" class="form-label align-items-center">Provinsi<danger
                                                    class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control required" id="provRumah"
                                                name="provRumah" aria-describedby="emailHelp" value="New York" required>
                                        </div>
                                    </div>
                                    <div class="row d-flex  align-items-center mb-3">
                                        <div class="col-md-2">
                                            <label for="alamatNoTelp" class="form-label align-items-center">No. Telp Rumah
                                                <danger class="text-danger">*</danger>
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" class="form-control required" id="alamatNoTelp"
                                                name="alamatNoTelp" aria-describedby="emailHelp" value="01122334455"
                                                required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="alamatNoHp" class="form-label align-items-center">No. Hp<danger
                                                    class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" class="form-control required" id="alamatNoHp"
                                                name="alamatNoHp" aria-describedby="emailHelp" value="02233445566"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row d-flex  align-items-center mb-3">
                                        <div class="col-md-2">
                                            <label for="alamatEmail" class="form-label align-items-center">Email<danger
                                                    class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="email" class="form-control required" id="alamatEmail"
                                                name="alamatEmail" aria-describedby="emailHelp"
                                                value="johndoe@johndoe.com" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="alamatStatus" class="form-label align-items-center">Status Tempat
                                                Tinggal<danger class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control required" id="alamatStatus"
                                                name="alamatStatus" aria-describedby="emailHelp" value="Rumah Tinggal"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row d-flex  align-items-center mb-3">
                                        <div class="col-md-2">
                                            <label for="jarakRumah" class="form-label align-items-center">Jarak Tempat
                                                Tinggal ke SMK Ma'arif NU</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="jarakRumah" name="jarakRumah"
                                                aria-describedby="emailHelp" value="9000 Km">
                                        </div>
                                    </div>
                                    <div class="row d-flex  align-items-center mb-3">
                                        <div class="col-md-2">
                                            <label for="alatTransportasi" class="form-label align-items-center">Alat
                                                Trasnportasi</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="alatTransportasi"
                                                name="alatTransportasi" aria-describedby="emailHelp" value="Pesawat">
                                        </div>
                                    </div>
                                </section>

                                <!-- Step 3 -->
                                <h6>Step 3</h6>
                                <section>
                                    <label class="align-items-center mb-4 mt-3">Keterangan Orang Tua / Wali</label>
                                    <div class="row d-flex  align-items-center mb-3">
                                        <div class="col-md-2">
                                            <label for="noNIK" class="form-label align-items-center">NIK<danger
                                                    class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="number" class="form-control" id="noNIK" name="noNIK"
                                                aria-describedby="emailHelp" value="01234567890" required>
                                        </div>
                                    </div>
                                    <div class="row d-flex  align-items-center mb-3">
                                        <div class="col-md-2">
                                            <label for="namaAyah" class="form-label align-items-center">Nama Ayah<danger
                                                    class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control required" id="namaAyah"
                                                name="namaAyah" aria-describedby="emailHelp" value="John Cena" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="namaIbu" class="form-label align-items-center">Nama Ibu<danger
                                                    class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control required" id="namaIbu"
                                                name="namaIbu" aria-describedby="emailHelp" value="Marry Doe" required>
                                        </div>
                                    </div>
                                    <div class="row d-flex  align-items-center mb-3">
                                        <div class="col-md-2">
                                            <label class="form-label align-items-center">Keadaan Ayah<danger
                                                    class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-md-4 d-flex align-items-center gap-3">
                                            <div class="form-check required">
                                                <input class="form-check-input" type="radio" name="radioAyah"
                                                    id="radioAyahHidup" checked>
                                                <label class="form-check-label" for="radioAyahHidup">
                                                    Hidup
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioAyah"
                                                    id="radioAyahAlm">
                                                <label class="form-check-label" for="radioAyahAlm">
                                                    Almarhum
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioAyah"
                                                    id="radioAyahCerai">
                                                <label class="form-check-label" for="radioAyahCerai">
                                                    Cerai
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label align-items-center">Keadaan Ibu<danger
                                                    class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-md-4 d-flex align-items-center gap-3">
                                            <div class="form-check required">
                                                <input class="form-check-input" type="radio" name="radioIbu"
                                                    id="radioIbuHidup" checked>
                                                <label class="form-check-label" for="radioIbuHidup">
                                                    Hidup
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioIbu"
                                                    id="radioIbuAlm">
                                                <label class="form-check-label" for="radioIbuAlm">
                                                    Almarhum
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioIbu"
                                                    id="radioIbuCerai">
                                                <label class="form-check-label" for="radioAyahCerai">
                                                    Cerai
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-flex  align-items-center mb-3">
                                        <div class="col-md-2">
                                            <label for="pekerjaanAyah" class="form-label align-items-center">Pekerjaan
                                                Ayah<danger class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control required" id="pekerjaanAyah"
                                                name="pekerjaanAyah" aria-describedby="emailHelp" value="Pesenmekdon"
                                                required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="pekerjaanIbu" class="form-label align-items-center">Pekerjaan Ibu
                                                <danger class="text-danger">*</danger>
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control required" id="pekerjaanIbu"
                                                name="pekerjaanIbu" aria-describedby="emailHelp" value="Ibu rumah tangga"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row d-flex  align-items-center mb-3">
                                        <div class="col-md-2">
                                            <label for="penghasilanAyah" class="form-label align-items-center">Penghasilan
                                                Ayah perbulan<danger class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" class="form-control required" id="penghasilanAyah"
                                                name="penghasilanAyah" aria-describedby="emailHelp" value="100000000"
                                                required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="penghasilanIbu" class="form-label align-items-center">Penghasilan
                                                Ibu perbulan<danger class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" class="form-control required" id="penghasilanIbu"
                                                name="penghasilanIbu" aria-describedby="emailHelp" value="0"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row d-flex  align-items-center mb-3">
                                        <div class="col-md-2">
                                            <label for="pendidikanAyah" class="form-label align-items-center">Pendidikan
                                                Ayah
                                                <danger class="text-danger">*</danger>
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-select" id="pendidikanAyah" name="pendidikanAyah"
                                                data-placeholder="Pilih Pendidikan">
                                                <option value="sd">SD</option>
                                                <option value="smp">SMP</option>
                                                <option value="sma/smk">SMA/SMK</option>
                                                <option value="d1">D1</option>
                                                <option value="d2">D2</option>
                                                <option value="d3">D3</option>
                                                <option value="s1/d4">S1/D4</option>
                                                <option value="s2">S2</option>
                                                <option value="s3" selected>S3</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="pendidikanIbu" class="form-label align-items-center">Pendidikan
                                                Ayah
                                                <danger class="text-danger">*</danger>
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-select" id="pendidikanIbu" name="pendidikanIbu"
                                                data-placeholder="Pilih Pendidikan">
                                                <option value="sd">SD</option>
                                                <option value="smp">SMP</option>
                                                <option value="sma/smk">SMA/SMK</option>
                                                <option value="d1">D1</option>
                                                <option value="d2">D2</option>
                                                <option value="d3">D3</option>
                                                <option value="s1/d4">S1/D4</option>
                                                <option value="s2">S2</option>
                                                <option value="s3" selected>S3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row d-flex  align-items-center mb-3">
                                        <div class="col-md-2">
                                            <label for="tanggalLahirAyah" class="form-label align-items-center">Tanggal
                                                Lahir Ayah<danger class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="date" class="form-control required" id="tanggalLahirAyah"
                                                value="today" />
                                        </div>
                                        <div class="col-md-2">
                                            <label for="tanggalLahirIbu" class="form-label align-items-center">Tanggal
                                                Lahir Ibu<danger class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="date" class="form-control required" id="tanggalLahirIbu"
                                                value="today" />
                                        </div>
                                    </div>
                                    <div class="row d-flex  align-items-center mb-3">
                                        <div class="col-md-2">
                                            <label for="alamatOrtu" class="form-label align-items-center">Alamat Rumah
                                                <danger class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="alamatOrtu" name="alamatOrtu"
                                                aria-describedby="emailHelp" value="Beverly Hills San Diego" required>
                                        </div>
                                    </div>
                                    <div class="row d-flex  align-items-center mb-3">
                                        <div class="col-md-2">
                                            <label for="rtRumahOrtu" class="form-label align-items-center">RT<danger
                                                    class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control required" id="rtRumahOrtu"
                                                name="rtRumahOrtu" aria-describedby="emailHelp" value="01" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="rwRumahOrtu" class="form-label align-items-center">RW<danger
                                                    class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control required" id="rwRumahOrtu"
                                                name="rwRumahOrtu" aria-describedby="emailHelp" value="05" required>
                                        </div>
                                    </div>
                                    <div class="row d-flex  align-items-center mb-3">
                                        <div class="col-2">
                                            <label for="kodePosOrtu" class="form-label align-items-center">Kode Pos<danger
                                                    class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-10">
                                            <input type="number" class="form-control required" id="kodePosOrtu"
                                                name="kodePosOrtu" aria-describedby="emailHelp" value="900990" required>
                                        </div>
                                    </div>
                                    <div class="row d-flex  align-items-center mb-3">
                                        <div class="col-md-2">
                                            <label for="KelurahanRumahOrtu"
                                                class="form-label align-items-center">Kelurahan<danger
                                                    class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control required" id="KelurahanRumahOrtu"
                                                name="KelurahanRumahOrtu" aria-describedby="emailHelp"
                                                value="San Martin 1" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="KecamatanRumahOrtu"
                                                class="form-label align-items-center">Kecamatan<danger
                                                    class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control required" id="kecamatanRumahOrtu"
                                                name="kecamatanRumahOrtu" aria-describedby="emailHelp"
                                                value="San Martin Pusat" required>
                                        </div>
                                    </div>
                                    <div class="row d-flex  align-items-center mb-3">
                                        <div class="col-md-2">
                                            <label for="kotaRumahOrtu" class="form-label align-items-center">Kota/Kab.
                                                <danger class="text-danger">*</danger>
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control required" id="kotaRumahOrtu"
                                                name="kotaRumahOrtu" aria-describedby="emailHelp" value="San Diego"
                                                required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="provRumahOrtu" class="form-label align-items-center">Provinsi
                                                <danger class="text-danger">*</danger>
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control required" id="provRumahOrtu"
                                                name="provRumahOrtu" aria-describedby="emailHelp" value="New York"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row d-flex  align-items-center mb-3">
                                        <div class="col-md-2">
                                            <label for="alamatNoTelpOrtu" class="form-label align-items-center">No. Telp
                                                Rumah<danger class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" class="form-control required" id="alamatNoTelpOrtu"
                                                name="alamatNoTelpOrtu" aria-describedby="emailHelp" value="01122334455"
                                                required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="alamatNoHpOrtu" class="form-label align-items-center">No. Hp
                                                <danger class="text-danger">*</danger>
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" class="form-control required" id="alamatNoHpOrtu"
                                                name="alamatNoHpOrtu" aria-describedby="emailHelp" value="02233445566"
                                                required>
                                        </div>
                                    </div>
                                </section>

                                <!-- Step 4 -->
                                <h6>Step 4</h6>
                                <section>
                                    <label for="exampleInputEmail1" class="align-items-center mb-4 mt-5">Jurusan yang
                                        dipilih </label>
                                    <div class="row d-flex  align-items-center mb-3">
                                        <div class="col-md-2">
                                            <label for="exampleInputEmail1" class="form-label align-items-center">Jurusan
                                                <danger class="text-danger">*</danger>
                                            </label>
                                        </div>
                                        <div class="col-md-10">
                                            <select class="form-select" id="jurusanAdd" name="jurusanAdd"
                                                data-placeholder="Pilih Jurusan">
                                                <option value="" required>Pilih Jurusan</option>
                                                <option value="1" selected>DKV</option>
                                                <option value="2">Logistik</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row d-flex  align-items-center mb-3">
                                        <div class="col-md-2">
                                            <label for="exampleInputEmail1"
                                                class="form-label align-items-center">Gelombang<danger
                                                    class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-md-10">
                                            <select class="form-select" id="jurusanAdd" name="jurusanAdd"
                                                data-placeholder="Pilih Jurusan">
                                                <option value="" required>Pilih Gelombang</option>
                                                <option value="1" selected>1</option>
                                                <option value="2">2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row d-flex  align-items-center mb-3">
                                        <div class="col-md-2">
                                            <label for="exampleInputEmail1" class="form-label align-items-center">Jalur
                                                Pendaftaran<danger class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control required" id="tinggibadan"
                                                name="tinggibadan" aria-describedby="emailHelp"
                                                value="JALUR PENDAFTARAN PMDK" disabled>
                                        </div>
                                    </div>
                                    <div class="row d-flex  align-items-center mb-3">
                                        <div class="col-md-2">
                                            <label for="exampleInputEmail1" class="form-label align-items-center">Tahun
                                                Ajaran<danger class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control required" id="tinggibadan"
                                                name="tinggibadan" aria-describedby="emailHelp" value="2024/2025"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="row d-flex  align-items-center mb-3">
                                        <div class="col-md-2">
                                            <label for="exampleInputEmail1" class="form-label align-items-center">Bukti
                                                Pembayaran<danger class="text-danger">*</danger></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="file" class="form-control required" id="tinggibadan"
                                                name="tinggibadan" aria-describedby="emailHelp" value="2024/2025"
                                                disabled>

                                        </div>
                                    </div>
                                </section>
                            </form>
                        </div>
                    </div>
                    {{-- end form with validation --}}

                </div>
            </div>
        </section>
    </div>
    </div>

@endsection

@section('script')

    <script>
        $('#genderAdd').select2({
            theme: "bootstrap-5",
        });
        // Start Date Add
    </script>
@endsection
