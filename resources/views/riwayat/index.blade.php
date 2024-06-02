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
                        <img id="buktibayar" class="w-100" src="{{ asset('images/buktipembayaran.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Update status -->
        <div class="modal fade" id="modalStatus" tabindex="-1" aria-labelledby="modalStatus" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalStatusTitle">Status Pembayaran</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="formAccStatusRegistrasi">
                            @csrf
                            <input type="text" id="idData" name="id" hidden>
                            <div class="col-sm-12 mb-3">
                                <label for="addRole" class="form-label">Status Pembayaran</label>
                                <select class="form-select" id="addRole" name="addRole" data-placeholder="Pilih Role">
                                    @foreach ($list_statusregis as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_payment }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($role == 4 || $role == 1 )
                            <div class="col-sm-12 mb-3">
                                <label for="addRole" class="form-label">Status Registrasi</label>
                                <select class="form-select" id="addRole" name="addRole" data-placeholder="Pilih Role">
                                    @foreach ($list_statusregis as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_payment }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endif

                    </div>
                    <div class="modal-footer">
                        <div class="d-flex gap-2 justify-content-end">
                            <button class="btn btn-primary d-none" type="button" id="SpinnerBtnAdd">
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                Loading...
                            </button>
                            <button id="btnSubmit" type="submit" class="btn btn-primary">Save Change</button>
                        </div>
                    </div>
                </form>
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
                <div id="containerCards" class="table-responsive">

                    <div class="table-responsive">

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
            $.ajax({
                    url: "{{ route('riwayat.getdata') }}",
                    method: "GET",
                    data: {},
                    beforeSend: () => {
                        $('#containerCards').html(loadSpin)
                        // console.log(selectRoom)
                    }
                })
                .done(res => {
                    $('#containerCards').html(res)

                })

            $('.btnEdit').on('click', function(e) {
                window.location.href = '{{ route('/edit-form') }}';
            })

            $(document).on('click', '.btnDetail', function(e) {
                e.preventDefault();

                const id = $(this).data('id');
                const buktibayar = $(this).data('image');
                const modalFormEdit = $('#modalBuktiPembayaran');
                const buktibayarLengkap = 'UploadBuktiBayar/' + buktibayar;

                $('#buktibayar').attr('src', buktibayarLengkap);
                modalFormEdit.modal('show');

                // Ajax request

            });

            $(document).on('click', '.btnAcc', function(e) {
                e.preventDefault();

                const id = $(this).data('id');
                const buktibayar = $(this).data('image');
                const modalFormEdit = $('#modalStatus');
                const buktibayarLengkap = 'UploadBuktiBayar/' + buktibayar;

                $('#buktibayar').attr('src', buktibayarLengkap);
                modalFormEdit.modal('show');
                $('#idData').val(id);
                // Ajax request
            });



            $('#formAccStatusRegistrasi').on('submit', function(e) {
                e.preventDefault();


                const formData = new FormData(this); // Membuat objek FormData untuk mengambil nilai-nilai formulir
                const id = $(this).data('id');


                Swal.fire({
                    title: "Apa kamu ingin merubah daftar card?",
                    icon: 'warning',
                    showCancelButton: true,
                    cancelButtonColor: '#6e7881',
                    confirmButtonColor: '#dd3333',
                    cancelButtonText: 'Cancel',
                    confirmButtonText: 'Yes',
                    reverseButtons: true,
                    customClass: {
                        confirmButton: "swal-confirm-right",
                        cancelButton: "swal-cancel-left"
                    }
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            url: '{{ route('accRegis') }}',
                            method: 'POST',
                            data: new FormData(this),
                            cache: false,
                            processData: false,
                            contentType: false,
                            dataType: 'json',
                            beforeSend: () => {
                                spinner('SpinnerBtnAdd', 'btnSubmit');
                            }
                        }).done(res => {
                            hideSpinner('SpinnerBtnAdd', 'btnSubmit');
                            showMessage('success', res.message);
                            $('#modalAddJalur').modal('hide');
                            $('#formRegister').trigger('reset');
                            window.location = '{{ route('login') }}'
                            // window.location.reload();
                        }).fail(err => {
                            showMessage('error', err.message)
                            hideSpinner('SpinnerBtnAdd', 'btnSubmit');
                        });
                    }
                })

            });

        </script>
    @endsection
