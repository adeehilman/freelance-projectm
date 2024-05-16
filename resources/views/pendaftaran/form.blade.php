@extends('layouts.main')
@section('title', ' Form Pendaftaran Siswa')


@section('content')
<div class="container-fluid">
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
          <div class="row align-items-center">
            <div class="col-9">
              <h4 class="fw-semibold mb-8">Form Pendaftaran</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a class="text-muted text-decoration-none" href="./index.html">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item" aria-current="page">Form Wizard</li>
                </ol>
              </nav>
            </div>
            <div class="col-3">
              <div class="text-center mb-n5">
                <img src="../../dist/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
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
                        <section >
                             <label for="exampleInputEmail1" class="align-items-center mb-4 mt-3">Data Diri</label>
                            <div class="row d-flex  align-items-center mb-3">
                                <div class="col-2">
                                    <label for="exampleInputEmail1" class="form-label align-items-center">Nama Lengkap<danger class="text-danger">*</danger></label>
                                </div>
                                <div class="col-4">
                                    <input type="text" class="form-control required" id="namalengkap" name="namalengkap" aria-describedby="emailHelp" style="text-transform:uppercase" required>

                                </div>
                                <div class="col-2">
                                    <label for="exampleInputEmail1" class="form-label align-items-center">Nama Panggilan (Optional)</label>
                                </div>
                                <div class="col-4">
                                    <input type="text" class="form-control" id="namapanggilan" name="namapanggilan" aria-describedby="emailHelp"  style="text-transform:uppercase">

                                </div>
                            </div>
                            <div class="row d-flex  align-items-center mb-3">
                                <div class="col-md-2">
                                    <label for="exampleInputEmail1" class="form-label align-items-center">Jenis Kelamin<danger class="text-danger">*</danger></label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check required">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                          Laki-laki
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                         Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex  align-items-center mb-3">
                                <div class="col-md-2">
                                    <label for="exampleInputEmail1" class="form-label align-items-center">NISN<danger class="text-danger">*</danger></label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control required" id="tinggibadan" name="tinggibadan" aria-describedby="emailHelp" required>

                                </div>
                            </div>
                            <div class="row d-flex  align-items-center mb-3">
                                <div class="col-md-2">
                                    <label for="exampleInputEmail1" class="form-label align-items-center">Tempat Lahir<danger class="text-danger">*</danger></label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control required" id="tempatlahir" name="tempatlahir" aria-describedby="emailHelp" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="exampleInputEmail1" class="form-label align-items-center">Tanggal Lahir<danger class="text-danger">*</danger></label>
                                </div>
                                <div class="col-md-4">
                                    <input type="date" class="form-control required" id="wdate2" />
                                </div>
                            </div>
                            <div class="row d-flex  align-items-center mb-3">
                                <div class="col-md-2">
                                    <label for="exampleInputEmail1" class="form-label align-items-center">Tinggi Badan<danger class="text-danger">*</danger></label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control required" id="tinggibadan" name="tinggibadan" aria-describedby="emailHelp" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="exampleInputEmail1" class="form-label align-items-center">Berat badan<danger class="text-danger">*</danger></label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control required" id="tinggibadan" name="tinggibadan" aria-describedby="emailHelp" required>
                                </div>
                            </div>
                            <div class="row d-flex  align-items-center mb-3">
                                <div class="col-md-2">
                                    <label for="exampleInputEmail1" class="form-label align-items-center">Berkebutuhan khusus</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="tinggibadan" name="tinggibadan" aria-describedby="emailHelp" placeholder="Isi jika ada">

                                </div>
                            </div>
                            <div class="row d-flex  align-items-center mb-3">
                                <div class="col-md-2">
                                    <label for="exampleInputEmail1" class="form-label align-items-center">Agama<danger class="text-danger">*</danger></label>
                                </div>
                                <div class="col-md-10">
                                    <select class="form-select" id="genderAdd" name="genderAdd" data-placeholder="Pilih Agama">
                                        <option value="" selected required>Agama</option>
                                        <option value="1">Islam</option>
                                        <option value="2">Kristen</option>
                                </select>

                                </div>
                            </div>
                            {{-- TODO: Ambil dari data dinamis--}}
                            <label for="exampleInputEmail1" class="align-items-center mb-4 mt-5">Jurusan yang dipilih </label>
                            <div class="row d-flex  align-items-center mb-3">
                                <div class="col-md-2">
                                    <label for="exampleInputEmail1" class="form-label align-items-center">Jurusan<danger class="text-danger">*</danger></label>
                                </div>
                                <div class="col-md-10">
                                    <select class="form-select" id="jurusanAdd" name="jurusanAdd" data-placeholder="Pilih Jurusan">
                                        <option value="" selected required>Pilih Jurusan</option>
                                        <option value="1">DKV</option>
                                        <option value="2">Logistik</option>
                                     </select>

                                </div>
                            </div>
                            <div class="row d-flex  align-items-center mb-3">
                                <div class="col-md-2">
                                    <label for="exampleInputEmail1" class="form-label align-items-center">Gelombang<danger class="text-danger">*</danger></label>
                                </div>
                                <div class="col-md-10">
                                    <select class="form-select" id="jurusanAdd" name="jurusanAdd" data-placeholder="Pilih Jurusan">
                                        <option value="" selected required>Pilih Jurusan</option>
                                        <option value="1">DKV</option>
                                        <option value="2">Logistik</option>
                                     </select>

                                </div>
                            </div>

                            <div class="row d-flex  align-items-center mb-3">
                                <div class="col-md-2">
                                    <label for="exampleInputEmail1" class="form-label align-items-center">Jalur Pendaftaran<danger class="text-danger">*</danger></label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control required" id="tinggibadan" name="tinggibadan" aria-describedby="emailHelp" value="JALUR PENDAFTARAN PMDK" disabled >

                                </div>
                            </div>
                            <div class="row d-flex  align-items-center mb-3">
                                <div class="col-md-2">
                                    <label for="exampleInputEmail1" class="form-label align-items-center">Tahun Ajaran<danger class="text-danger">*</danger></label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control required" id="tinggibadan" name="tinggibadan" aria-describedby="emailHelp"  value="2024/2025" disabled>

                                </div>
                            </div>
                            <div class="row d-flex  align-items-center mb-3">
                                <div class="col-md-2">
                                    <label for="exampleInputEmail1" class="form-label align-items-center">Bukti Pembayaran<danger class="text-danger">*</danger></label>
                                </div>
                                <div class="col-md-10">
                                    <input type="file" class="form-control required" id="tinggibadan" name="tinggibadan" aria-describedby="emailHelp"  value="2024/2025" disabled>

                                </div>
                            </div>
                            {{-- <label for="exampleInputEmail1" class="align-items-center mb-4 mt-3">Keluarga</label>
                            <div class="row d-flex  align-items-center mb-3">
                                <div class="col-md-2">
                                    <label for="exampleInputEmail1" class="form-label align-items-center">Jumlah Saudara</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="number" class="form-control" id="tinggibadan" name="tinggibadan" aria-describedby="emailHelp">

                                </div>
                            </div>
                             <div class="row d-flex  align-items-center mb-3">
                                <div class="col-md-2">
                                    <label for="exampleInputEmail1" class="form-label align-items-center">Saudara Kandung</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="number" class="form-control required" id="tinggibadan" name="tinggibadan" aria-describedby="emailHelp" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="exampleInputEmail1" class="form-label align-items-center">Saudara Tiri/Angkat</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="number" class="form-control required" id="tinggibadan" name="tinggibadan" aria-describedby="emailHelp" required>
                                </div>
                            </div> --}}

                        </section>
                        <!-- Step 2 -->
                        <h6>Step 2</h6>
                        <section>
                            <label for="exampleInputEmail1" class="align-items-center mb-4 mt-5">Alamat</label>
                            <div class="row d-flex  align-items-center">
                                <div class="col-2">
                                    <label for="exampleInputEmail1" class="form-label align-items-center mb-4 mt-3">Provinsi</label>
                                </div>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="sdrangkat" name="sdrangkat" aria-describedby="emailHelp" required>

                                </div>

                            </div>
                            <div class="row d-flex  align-items-center">
                                <div class="col-2">
                                    <label for="exampleInputEmail1" class="form-label align-items-center mb-4 mt-3">Kota/Kabupaten</label>
                                </div>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="sdrangkat" name="sdrangkat" aria-describedby="emailHelp" required>

                                </div>


                            </div>
                            <div class="row d-flex  align-items-center">
                                <div class="col-2">
                                    <label for="exampleInputEmail1" class="form-label align-items-center mb-4 mt-3">Kelurahan</label>
                                </div>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="sdrangkat" name="sdrangkat" aria-describedby="emailHelp" required>

                                </div>


                            </div>
                            <div class="row d-flex  align-items-center">
                                <div class="col-2">
                                    <label for="exampleInputEmail1" class="form-label align-items-center mb-4 mt-3">Kecamatan</label>
                                </div>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="sdrangkat" name="sdrangkat" aria-describedby="emailHelp" required>

                                </div>


                            </div>
                        </section>
                        <!-- Step 3 -->
                        <h6>Step 3</h6>
                        <section>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="mb-3">
                                <label for="wint1">Interview For :</label>
                                <input type="text" class="form-control required" id="wint1" />
                              </div>
                              <div class="mb-3">
                                <label for="wintType1">Interview Type :</label>
                                <select class="form-select required" id="wintType1" data-placeholder="Type to search cities" name="wintType1">
                                  <option value="Banquet">Normal</option>
                                  <option value="Fund Raiser">Difficult</option>
                                  <option value="Dinner Party">Hard</option>
                                </select>
                              </div>
                              <div class="mb-3">
                                <label for="wLocation1">Location :</label>
                                <select class="form-select required" id="wLocation1" name="wlocation">
                                  <option value="">Select City</option>
                                  <option value="India">India</option>
                                  <option value="USA">USA</option>
                                  <option value="Dubai">Dubai</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-3">
                                <label for="wjobTitle2">Interview Date :</label>
                                <input type="date" class="form-control required" id="wjobTitle2" />
                              </div>
                              <div class="mb-3">
                                <label>Requirements :</label>
                                <div class="c-inputs-stacked">
                                  <div class="form-check">
                                    <input type="radio" id="customRadio16" name="customRadio" class="form-check-input" />
                                    <label class="form-check-label" for="customRadio16">Employee</label>
                                  </div>
                                  <div class="form-check">
                                    <input type="radio" id="customRadio17" name="customRadio" class="form-check-input" />
                                    <label class="form-check-label" for="customRadio17">Contract</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </section>
                        <!-- Step 4 -->
                        <h6>Step 4</h6>
                        <section>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="mb-3">
                                <label for="behName1">Behaviour :</label>
                                <input type="text" class="form-control required" id="behName1" />
                              </div>
                              <div class="mb-3">
                                <label for="participants1">Confidance</label>
                                <input type="text" class="form-control required" id="participants1" />
                              </div>
                              <div class="mb-3">
                                <label for="participants1">Result</label>
                                <select class="form-select required" id="participants1" name="location">
                                  <option value="">Select Result</option>
                                  <option value="Selected">Selected</option>
                                  <option value="Rejected">Rejected</option>
                                  <option value="Call Second-time"> Call Second-time </option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-3">
                                <label for="decisions1">Comments</label>
                                <textarea name="decisions" id="decisions1" rows="4" class="form-control"></textarea>
                              </div>
                              <div class="mb-3">
                                <label>Rate Interviwer :</label>
                                <div class="c-inputs-stacked">
                                  <div class="form-check">
                                    <input type="radio" id="customRadio11" name="customRadio" class="form-check-input" />
                                    <label class="form-check-label" for="customRadio11">1 star</label>
                                  </div>
                                  <div class="form-check">
                                    <input type="radio" id="customRadio12" name="customRadio" class="form-check-input" />
                                    <label class="form-check-label" for="customRadio12">2 star</label>
                                  </div>
                                  <div class="form-check">
                                    <input type="radio" id="customRadio13" name="customRadio" class="form-check-input" />
                                    <label class="form-check-label" for="customRadio13">3 star</label>
                                  </div>
                                  <div class="form-check">
                                    <input type="radio" id="customRadio14" name="customRadio" class="form-check-input" />
                                    <label class="form-check-label" for="customRadio14">4 star</label>
                                  </div>
                                  <div class="form-check">
                                    <input type="radio" id="customRadio15" name="customRadio" class="form-check-input" />
                                    <label class="form-check-label" for="customRadio15">5 star</label>
                                  </div>
                                </div>
                              </div>
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


    {{-- TODO: Lanjutkan form nya --}}
    {{-- <div class="container-fluid">


      {{-- <div class="card"> --}}
        {{-- <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Forms 1</h5>
          <div class="card">
            <div class="card-body">
              <form>
                <div class="mb-3">
                    <div class="row d-flex  align-items-center mb-3">
                        <div class="col-2">
                            <label for="exampleInputEmail1" class="form-label align-items-center">Nama Lengkap</label>
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control" id="namalengkap" name="namalengkap" aria-describedby="emailHelp" required>

                        </div>
                        <div class="col-2">
                            <label for="exampleInputEmail1" class="form-label align-items-center">Nama Panggilan (Optional)</label>
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control" id="namapanggilan" name="namapanggilan" aria-describedby="emailHelp">

                        </div>
                    </div>


                    <div class="row d-flex  align-items-center mb-3">
                        <div class="col-2">
                            <label for="exampleInputEmail1" class="form-label align-items-center">Jenis Kelamin</label>
                        </div>
                        <div class="col-10">
                            <select class="form-select" id="genderAdd" name="genderAdd" data-placeholder="Pilih Jenis Kelamin">
                                                <option value="" selected required>Pilih Jenis Kelamin</option>
                                                <option value="1">Laki Laki</option>
                                                <option value="2">Perempuan</option>
                                        </select>

                        </div>
                    </div>

                    <div class="mb-3">
                        {{-- <label for="exampleInputEmail1" class="align-items-center mb-4 mt-5">Tempat dan Tanggal Lahir</label> --}}
                        {{-- <div class="row d-flex  align-items-center">
                            <div class="col-2">
                                <label for="exampleInputEmail1" class="form-label align-items-center">Tinggi Badan</label>
                            </div>
                            <div class="col-10">
                                <input type="text" class="form-control" id="tinggibadan" name="tinggibadan" aria-describedby="emailHelp" required>

                            </div>
                        </div>

                    </div>

                    <div class="mb-3">
                        <div class="row d-flex  align-items-center">
                            <div class="col-2">
                                <label for="exampleInputEmail1" class="form-label align-items-center">Berat Badan</label>
                            </div>
                            <div class="col-10">
                                <input type="date" class="form-control" id="beratbadan" name="beratbadan" aria-describedby="emailHelp" required>

                            </div>
                        </div>

                    </div>
                    <div class="mb-3"> --}}
                        {{-- <label for="exampleInputEmail1" class="align-items-center mb-4 mt-5">Tempat dan Tanggal Lahir</label> --}}
                        {{-- <div class="row d-flex  align-items-center">
                            <div class="col-2">
                                <label for="exampleInputEmail1" class="form-label align-items-center">Kebutuhan Khusus</label>
                            </div>
                            <div class="col-10">
                                <input type="text" class="form-control" id="kebutuhankhusus" name="kebutuhankhusus" aria-describedby="emailHelp" required>

                            </div>
                        </div>

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="align-items-center mb-4 mt-5">Keluarga</label>
                        <div class="row d-flex  align-items-center">
                            <div class="col-2">
                                <label for="exampleInputEmail1" class="form-label align-items-center">Jumlah Saudara kandung</label>
                            </div>
                            <div class="col-10">
                                <input type="number" class="form-control" id="sdrkandung" name="sdrkandung" aria-describedby="emailHelp" required>

                            </div>
                        </div>

                    </div>
                    <div class="mb-3"> --}}
                        {{-- <label for="exampleInputEmail1" class="align-items-center mb-4 mt-5">Tempat dan Tanggal Lahir</label> --}}
                        {{-- <div class="row d-flex  align-items-center">
                            <div class="col-2">
                                <label for="exampleInputEmail1" class="form-label align-items-center">Jumlah Saudara Tiri</label>
                            </div>
                            <div class="col-10">
                                <input type="number" class="form-control" id="sdrtiri" name="sdrtiri" aria-describedby="emailHelp" required>

                            </div>
                        </div>

                    </div>
                    <div class="mb-3"> --}}
                        {{-- <label for="exampleInputEmail1" class="align-items-center mb-4 mt-5">Tempat dan Tanggal Lahir</label> --}}
                        {{-- <div class="row d-flex  align-items-center">
                            <div class="col-2">
                                <label for="exampleInputEmail1" class="form-label align-items-center">Jumlah Saudara Angkat</label>
                            </div>
                            <div class="col-10">
                                <input type="number" class="form-control" id="sdrangkat" name="sdrangkat" aria-describedby="emailHelp" required>

                            </div>
                        </div>

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="align-items-center mb-4 mt-5">Alamat</label>
                        <div class="row d-flex  align-items-center">
                            <div class="col-2">
                                <label for="exampleInputEmail1" class="form-label align-items-center">Provinsi</label>
                            </div>
                            <div class="col-10">
                                <input type="text" class="form-control" id="sdrangkat" name="sdrangkat" aria-describedby="emailHelp" required>

                            </div>
                        </div>

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="align-items-center mb-4 mt-5">Alamat</label>
                        <div class="row d-flex  align-items-center">
                            <div class="col-2">
                                <label for="exampleInputEmail1" class="form-label align-items-center">Provinsi</label>
                            </div>
                            <div class="col-10">
                                <input type="text" class="form-control" id="sdrangkat" name="sdrangkat" aria-describedby="emailHelp" required>

                            </div>
                            <div class="col-2">
                                <label for="exampleInputEmail1" class="form-label align-items-center">Kota/Kabupaten</label>
                            </div>
                            <div class="col-10">
                                <input type="text" class="form-control" id="sdrangkat" name="sdrangkat" aria-describedby="emailHelp" required>

                            </div>
                            <div class="col-2">
                                <label for="exampleInputEmail1" class="form-label align-items-center">Kelurahan</label>
                            </div>
                            <div class="col-10">
                                <input type="text" class="form-control" id="sdrangkat" name="sdrangkat" aria-describedby="emailHelp" required>

                            </div>
                        </div>

                    </div>


                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>  --}}
      {{-- </div> --}}
    {{-- </div>  --}}
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
