@extends('layouts.main')

@section('mainheader')
@endsection
@section('mainsidebar')
@endsection
@section('mainnavbar')
@endsection
@section('mainfooter')
@endsection
@section('title', 'Login Page')

<style>
     .logo-container {
            position: absolute;
            top: 20px; /* Adjust this value as needed */
            left: 50%;
            transform: translateX(-50%);
            z-index: 1;
        }

</style>
@section('content')
    <div class="container-fluid" style="background-color: #f4f7fb">
        <div class="logo-container">
            <img src="{{ asset('favicon.ico') }}" alt="Logo-Dark" class="dark-logo">
        </div>
        <div class="container">
            <div class="row justify-content-center align-items-center vh-100">
                <div class="col-xl-5 col-xxl-4 bg-body p-4 rounded shadow">

                    <h2 class="mb-3 fs-7 fw-bolder text-center">Selamat Datang</h2>
                    <p class=" mb-9 text-center">Masuk ke akun anda</p>
                    <form action="#" method="POST" id="formLogin">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Username NISN</label>
                            <input type="text" name="nisn" id="nisn" class="form-control"
                                placeholder="Insert your NISN">
                        </div>
                        <div class="mb-4">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Insert Password">
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked"
                                    checked>
                                <label class="form-check-label text-dark" for="flexCheckChecked">
                                    Ingat Saya ?
                                </label>
                            </div>
                            <a class="text-primary fw-medium" href="#">Lupa
                                Password ?</a>
                        </div>
                        <button class="btn btn-success d-none w-100 py-8 mb-4 rounded-2" type="button" id="SpinnerBtnAdd">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>
                        <button type="submit" id="btnSubmit"
                            class="btn btn-success w-100 py-8 mb-4 rounded-2">Login</button>
                        <div class="d-flex align-items-center justify-content-center">
                            <p class="mb-0 fw-medium">Belum punya akun ?</p>
                            <a class="text-primary fw-medium ms-2" href="{{ route('register') }}">Buat akun</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        const formLogin = $('#formLogin');
        const loaderIcon = `<i class='bx bx-loader bx-spin align-middle me-2'></i>`
        const btnSubmit = $('#btnSubmit')

        formLogin.submit(function(e) {
            e.preventDefault();


            $.ajax({
                url: '{{ route('auth.login') }}',
                method: 'post',
                data: $(this).serialize(),
                dataType: 'json',
                beforeSend: () => {
                    spinner('SpinnerBtnAdd', 'btnSubmit');
                },
                success: res => {
                    if (res.status === 400) {
                        showError('nisn', res.messages.nisn)
                        showError('password', res.messages.password)


                    }

                    if (res.status === 401) {
                        hideSpinner('SpinnerBtnAdd', 'btnSubmit');
                        showMessage('error', res.messages);
                    }

                    if (res.status === 200) {
                        removeValidationClass(formLogin);
                        formLogin[0].reset()
                        // showMessage('success', 'Data berhasil tersimpan');
                        window.location = '{{ route('dashboard') }}'
                        console.log(res);
                        btnSubmit.children().remove();
                    }
                },
                error: err => {

                    showMessage('error', res.messages);
                }
            })
        })
    </script>
@endsection
