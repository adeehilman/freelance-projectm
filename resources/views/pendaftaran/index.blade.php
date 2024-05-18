@extends('layouts.main')
@section('title', 'Pendaftaran Siswa')


@section('content')
    <!--  Header End -->
    <div class="container min-vh-100" style="padding-top: 85px; padding-bottom: 12px">

        <!-- modal Add Room Meeting-->
        <div class="modal fade" data-bs-backdrop="static" id="modalAddJalur" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Tambah Jalur Pendaftaran</h1>
                        <button type="button" class="btn-close" id="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="font-size: 16px;">
                        <form id="formJalurPendaftaran" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12 mt-2">
                                    <label for="addRoomName" class="form-label">Nama Jalur Pendaftaran</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="namaJalur" name="namaJalur" required>
                                    </div>
                                </div>
                                <div class="col-sm-12 mt-2">
                                    <label for="addRoomName" class="form-label">Jurusan</label>
                                    <select class="form-select" id="genderAdd" name="jurusanAdd"
                                        data-placeholder="Pilih Jurusan">
                                        @foreach ($list_jurusan as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_jurusan }}</option>
                                        @endforeach

                                    </select>

                                </div>
                                <div class="col-sm-12 mt-2">
                                    <label for="gelombangAdd" class="form-label">Gelombang</label>
                                    <select class="form-select" id="gelombangAdd" name="gelombangAdd"
                                        data-placeholder="Pilih Gelombang">
                                        @foreach ($list_gelombang as $item)
                                            <option value="{{ $item->id }} ">{{ $item->nama_gelombang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-12 mt-2">
                                    <div class="row d-flex  align-items-center mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="awaltanggal" class="form-label">Tanggal Ajaran Awal</label>
                                                <input type="date" class="form-control" id="ajaranAwal" name="ajaranAwal"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="endtanggal" class="form-label">Tanggal Ajaran AKhir</label>
                                                <input type="date" class="form-control" id="akhirJalur" name="akhirJalur"
                                                    required>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="float-end">
                                <button type="button" class="btn text-danger" data-bs-dismiss="modal">Cancel</button>
                                <button id="btnTambah" type="submit" class="btn btn-primary">Tambah jalur</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Jalur Pendaftaran</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Pendaftaran</li>
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
                <h5 class="card-title fw-semibold mb-4">Jalur pendaftaran yang tersedia</h5>

                @if ($userInfo->role == 1)
                    <button type="button" id="btnJalurtambah" class="btn btn-primary mb-4"><i class='bx bx-list-plus'></i>
                        Tambah Jalur Pendaftaran</button>
                @endif

                <div class="row" id="containerCards">
                </div>
            </div>

        </div>

    </div>

@endsection

@section('script')
    <script>
        const loadSpin = `<div class="d-flex justify-content-center align-items-center mt-5">
                <div class="spinner-border d-flex justify-content-center align-items-center text-danger" role="status"><span class="visually-hidden">Loading...</span></div>
            </div> `;

        const imagePath = "{{ asset('images/register.jpg') }}";

        $.ajax({
                url: "{{ route('pendaftaran.getdata') }}",
                method: "GET",
                data: {

                },
                beforeSend: () => {
                    $('#containerCards').html()
                    $('#tableMeeting').DataTable({
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
            })

            // TODO: kalau sempat buatkan dinamis image di card menu
            .done(res => {
                const htmlElements = res.map(item => {
                    // Konversi tgl_mulai ke objek Date
                    const startDate = new Date(item.tgl_mulai);
                    const endDate = new Date(item.tgl_berakhir);

                    // Format tanggal menjadi "d F Y"
                    const formattedStartDate = startDate.toLocaleDateString('id-ID', {
                        day: 'numeric',
                        month: 'long',
                        year: 'numeric'
                    });
                    const formattedendDate = startDate.toLocaleDateString('id-ID', {
                        day: 'numeric',
                        month: 'long',
                        year: 'numeric'
                    });

                    return `
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body" >
                                    <h5 class="card-title" style="  overflow: hidden;
                                    text-overflow: ellipsis;
                                    white-space: nowrap;" title="${item.nama_jalur}"><i class='bx bxs-file'></i> ${item.nama_jalur}</h5>
                                    <h5 class="badge bg-${item.color_label} fw-bolder">${item.nama_jurusan}</h5>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="card-text">Pendaftaran</p>
                                                <p class="card-text">${formattedStartDate} s/d ${formattedendDate}</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="card-text">Gelombang</p>
                                                <p class="card-text">${item.nama_gelombang}</p>
                                            </div>
                                            <a href="{{ route('/form-pendaftaran') }}" data-id${item.jurusan_id} class="btn btn-primary mt-2">DAFTAR</a>
                                        </div>

                                    </div>
                            </div>
                        </div>
                    `;
                }).join('');

                // Setelah Anda membuat semua elemen HTML, tambahkan mereka ke dalam container yang diinginkan
                $('#containerCards').html(htmlElements);
            })


        $('#btnJalurtambah').on('click', function(e) {
            const modalAddJalur = $('#modalAddJalur')
            modalAddJalur.modal('show')
        })

        $('#formJalurPendaftaran').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route('insertjalur') }}',
                method: 'POST',
                data: new FormData(this),
                cache: false,
                processData: false,
                contentType: false,
                dataType: 'json',
            }).done(res => {

                showMessage('success', res.message);
                $('#modalAddJalur').modal('hide');
                window.location.reload();
            })
        });
    </script>
@endsection
