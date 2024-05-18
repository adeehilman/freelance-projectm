@extends('layouts.main')
@section('title', 'Riwayat Pendaftaran')


@section('content')

    <div class="container min-vh-100" style="padding-top: 85px; padding-bottom: 12px">

        <!-- Button trigger modal -->


        <!-- Modal Bukti Pembayaran -->
        <div class="modal fade" id="modalBuktiPembayaran" tabindex="-1" aria-labelledby="modalBuktiPembayaranLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalBuktiPembayaranLabel">Bukti Pembayaran</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img class="w-100" src="{{ asset('images/buktipembayaran.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit -->
        <div class="modal fade" id="modalEdit" data-bs-backdrop="static" tabindex="-1" aria-labelledby="modalEditLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalEditLabel">Edit Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Status pembayran</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn text-danger" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Riwayat Pendaftaran</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Riwayat</li>
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

        <div class="card">
            <div class="card-body">

                <h4 class="card-title mb-3">Riwayat Pendaftaran</h4>

                <div class="table-responsive">
                    <table id="multi_col_order" class="table table-bordered table-hover align-middle text-nowrap">
                        <thead class="table-light">
                            <!-- start row -->
                            <tr>
                                <th>Jalur Pendaftaran</th>
                                <th>NISN</th>
                                <th>Virtual Account</th>
                                <th>Tahun Ajaran</th>
                                <th>Status Pembayaran</th>
                                <th>Status Registrasi</th>
                                <th>Detail</th>
                                <th>Aksi</th>

                            </tr>
                            <!-- end row -->
                        </thead>
                        <tbody>
                            <!-- start row -->
                            <tr>
                                <td>JALUR PENDAFTARAN UMUM</td>
                                <td class="text-center">9384015273</td>
                                <td class="text-center">1122334455667788</td>
                                <td class="text-center">2024/2025</td>
                                <td class="text-danger text-center fw-semibold">Belum bayar</td>
                                <td class="text-warning text-center fw-semibold">Belum dikonfirmasi</td>
                                <td class="text-center"><button type="button" class="btn btn-primary"
                                        data-bs-toggle="modal" data-bs-target="#modalBuktiPembayaran">
                                        Lihat
                                    </button></td>
                                <td class="text-center"><button type="button" class="btn btn-warning btnEdit">
                                        Edit
                                    </button></td>
                            </tr>
                            <!-- end row -->
                            <!-- start row -->
                            <tr>
                                <td>BEASISWA ANAK PULAU</td>
                                <td class="text-center">9384015273</td>
                                <td class="text-center">1122334455667788</td>
                                <td class="text-center">2024/2025</td>
                                <td class="text-danger text-center fw-semibold">Belum bayar</td>
                                <td class="text-danger text-center fw-semibold">Ditolak</td>
                                <td class="text-center"><button type="button" class="btn btn-primary"
                                        data-bs-toggle="modal" data-bs-target="#modalBuktiPembayaran">
                                        Lihat
                                    </button></td>
                                <td class="text-center"><button type="button" class="btn btn-warning btnEdit">
                                        Edit
                                    </button></td>
                            </tr>
                            <!-- end row -->
                            <!-- start row -->
                            <tr>
                                <td>BEASISWA TAHFIDZ ALQURAN</td>
                                <td class="text-center">9384015273</td>
                                <td class="text-center">1122334455667788</td>
                                <td class="text-center">2024/2025</td>
                                <td class="text-success text-center fw-semibold">Sudah bayar</td>
                                <td class="text-success text-center fw-semibold">Diterima</td>
                                <td class="text-center"><button type="button" class="btn btn-primary"
                                        data-bs-toggle="modal" data-bs-target="#modalBuktiPembayaran">
                                        Lihat
                                    </button></td>
                                <td class="text-center"><button type="button" class="btn btn-warning btnEdit">
                                        Edit
                                    </button></td>
                            </tr>
                            <!-- end row -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>

@endsection

@section('script')
    <script>
        $.ajax({
            url: "{{ route('riwayat.getdata') }}",
            method: "GET",
            data: {},
            beforeSend: () => {
                $('#containerCards').html()
                // console.log(selectRoom)
                $('#tblRiwayat').DataTable({
                    searching: false,
                    lengthChange: false,
                    order: [], // Menghilangkan pengurutan default
                    columnDefs: [{
                            targets: 'sortable',
                            orderable: false
                        } // Mengaktifkan pengurutan pada kolom-kolom yang memiliki kelas "sortable"
                    ],
                });
            }
        });

        $('.btnEdit').on('click', function(e) {
            window.location.href = '{{ route('/edit-form') }}';
        })
    </script>
@endsection
