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
        </script>
    @endsection
