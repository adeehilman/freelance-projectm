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
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex gap-2 justify-content-end">
                                <button type="button" class="btn text-danger" data-bs-dismiss="modal">Cancel</button>
                                <button id="btnSubmitTambah" type="submit" class="btn btn-primary">Tambah</button>
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
                                <div class="col-sm-12 mb-3">
                                    <label for="addUsername" class="form-label">Username</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="addUsername" name="addUsername"
                                            placeholder="Insert username" value="Admin 1" required>
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label for="addPassword" class="form-label">Password</label>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="addPassword" name="addPassword"
                                            placeholder="Insert password" value="password123" required>
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label for="addRole" class="form-label">Role</label>
                                    <select class="form-select" id="addRole" name="addRole" data-placeholder="Pilih Role">
                                        <option value="admin" selected>Admin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex gap-2 justify-content-end">
                                <button type="button" class="btn text-danger" data-bs-dismiss="modal">Cancel</button>
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

                <div class="table-responsive">
                    <table id="multi_col_order" class="table table-bordered table-hover align-middle text-nowrap">
                        <thead class="table-light">
                            <!-- start row -->
                            <tr>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                            <!-- end row -->
                        </thead>
                        <tbody>
                            <!-- start row -->
                            <tr>
                                <td>Admin 1</td>
                                <td>Admin</td>
                                <td class="text-center"><button type="button" class="btn btn-warning btnEditAkun">
                                        Edit
                                    </button></td>
                            </tr>
                            <!-- end row -->
                            <!-- start row -->
                            <tr>
                                <td>Admin 2</td>
                                <td>Admin</td>
                                <td class="text-center"><button type="button" class="btn btn-warning btnEditAkun">
                                        Edit
                                    </button></td>
                            </tr>
                            <!-- end row -->
                            <!-- start row -->
                            <tr>
                                <td>Admin 2</td>
                                <td>Admin</td>
                                <td class="text-center"><button type="button" class="btn btn-warning btnEditAkun">
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
        $('#btnTambahAkun').on('click', function(e) {
            $('#modalTambahAkun').modal('show')
        })
        $('.btnEditAkun').on('click', function(e) {
            $('#modalEditAkun').modal('show')
        })
    </script>
@endsection
