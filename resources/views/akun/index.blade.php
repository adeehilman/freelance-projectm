@extends('layouts.main')
@section('title', 'Akun')


@section('content')

    <div class="container min-vh-100" style="padding-top: 85px; padding-bottom: 12px">

        <!-- Modal Tambah Akun -->
        <div class="modal fade" id="modalTambahAkun" data-bs-backdrop="static" tabindex="-1"
            aria-labelledby="modalTambahAkunLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalEditLabel">Tambah Akun</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formTambahAkun" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12 mb-3">
                                    <label for="addUsername" class="form-label">Username</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="addUsername" name="addUsername"
                                            placeholder="Insert username" required>
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label for="addPassword" class="form-label">Password</label>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="addPassword" name="addPassword"
                                            placeholder="Insert password" required>
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label for="addRole" class="form-label">Role</label>
                                    <select class="form-select" id="addRole" name="addRole" data-placeholder="Pilih Role">
                                        @foreach ($listRole as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex gap-2 justify-content-end">
                                <button type="button" class="btn text-danger" data-bs-dismiss="modal">Cancel</button>
                                <button class="btn btn-primary d-none" type="button" id="SpinnerBtnAdd">
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    Loading...
                                </button>
                                <button id="btnSubmit" type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit Akun -->
        <div class="modal fade" id="modalEditAkun" data-bs-backdrop="static" tabindex="-1"
            aria-labelledby="modalEditAkunLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalEditLabel">Edit Akun</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formEditAkun" autocomplete="off">
                            @csrf
                            <div class="row">
                                <input type="text" id="idData" name="idData" hidden>
                                <div class="col-sm-12 mb-3">
                                    <label for="addUsername" class="form-label">Username</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="editUsername" name="editUsername"
                                            placeholder="Insert username" value="" required>
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label for="addPassword" class="form-label">Password</label>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="editPassword" name="editPassword"
                                            placeholder="Insert password" value="">
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label for="addRole" class="form-label">Role</label>
                                    <select class="form-select" id="editRole" name="editRole" data-placeholder="Pilih Role">
                                        @foreach ($listRole as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex gap-2 justify-content-end">
                                <button type="button" class="btn text-danger" data-bs-dismiss="modal">Cancel</button>
                                <button class="btn btn-primary d-none" type="button" id="SpinnerBtnEdit">
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    Loading...
                                </button>
                                <button id="btnSubmitEdit" type="submit" class="btn btn-primary">Simpan</button>
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
                        <h4 class="fw-semibold mb-8">Akun</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none"
                                        href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Akun</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img src="{{ asset('images/breadcrumb/ChatBc.png') }}" alt=""
                                class="img-fluid mb-n4">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">

                <h4 class="card-title mb-3">Akun</h4>

                <button type="button" id="btnTambahAkun" class="btn btn-primary mb-4">Tambah Akun</button>

                <div id="containerCards">
                <div class="table-responsive">
                    <table id="multi_col_order" class="table table-bordered table-hover align-middle text-nowrap">

                    </table>
                </div>
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
                url: "{{ route('akun.getList') }}",
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

            $(document).on('click', '.btnEdit', function(e) {
                e.preventDefault();

                const id = $(this).data('id');
                const username = $(this).data('username');
                const role = $(this).data('role');
                const password = $(this).data('password');
                const modalFormEdit = $('#modalEditAkun');

                modalFormEdit.modal('show');
                $('#idData').val(id);
                $('#editUsername').val(username);
                $('#editRole').val(role);
                // Ajax request
            });

        $('#btnTambahAkun').on('click', function(e) {
            $('#modalTambahAkun').modal('show')
        })

        $('.btnEditAkun').on('click', function(e) {
            $('#modalEditAkun').modal('show')
        })

        $('#formTambahAkun').on('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this); // Membuat objek FormData untuk mengambil nilai-nilai formulir

            // Mengambil nilai-nilai dari formData

            $.ajax({
                url: '{{ route('akun.insertAKun') }}',
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

                window.location.reload();
            }).fail(err => {
            console.log(err);
                showMessage('error', err.message)
                hideSpinner('SpinnerBtnAdd', 'btnSubmit');
            });
        });

        $('#formEditAkun').on('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this); // Membuat objek FormData untuk mengambil nilai-nilai formulir
            const id = $(this).data('id');


            Swal.fire({
                    title: "Apa kamu ingin merubah akun?",
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
                            url: '{{ route('akun.editAkun') }}',
                            method: 'POST',
                            data: new FormData(this),
                            cache: false,
                            processData: false,
                            contentType: false,
                            dataType: 'json',
                            beforeSend: () => {
                                spinner('SpinnerBtnEdit', 'btnSubmitEdit');
                            }
                        }).done(res => {
                            hideSpinner('SpinnerBtnEdit', 'btnSubmitEdit');
                            showMessage('success', 'Berhasil ubah data');
                            $('#modalEditAkun').modal('hide');
                            $('#formEditAkun').trigger('reset');

                            window.location.reload();
                        }).fail(err => {

                            showMessage('error',err.responseJSON.message)
                            hideSpinner('SpinnerBtnEdit', 'btnSubmitEdit');
                        });
                    }
                })

            });

    </script>
@endsection
