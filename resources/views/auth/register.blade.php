<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register Page</title>
    <link rel="icon" href="{{ asset('images/logo-maarif.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/logo-maarif.png') }}" />
    <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2-bootstrap-5-theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatables.css') }}">
    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{ asset('libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
    <!-- Core Css -->
    <link id="themeColors" rel="stylesheet" href="{{ asset('css/style.min.css') }}" />
    <style>
        .wizard-content .wizard>.content {
            background: transparent;
            overflow: hidden;
            position: relative;
            width: auto;
            padding: 0;
            margin: 0;
            height: 100vh;
        }

        @media only screen and (max-width: 767px) {

            /* Semua gaya yang Anda inginkan untuk ukuran layar di bawah 768px */
            h5.header-welcome {
                display: none;
                /* Menyembunyikan elemen h5 */
            }
        }

        @media only screen and (min-width: 600px) and (max-width: 999px) {

            /* Semua gaya yang Anda inginkan untuk ukuran layar antara 600px dan 767px */
            h5.header-welcome {
                display: none;
                /* Menyembunyikan elemen h5 */
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid" style="background-color: #f4f7fb">
        <div class="container">
            <div class="row justify-content-center align-items-center vh-100">
                <div class="col-xl-5 col-xxl-4 bg-body p-4 rounded shadow">
                    <h2 class="mb-3 fs-7 fw-bolder text-center">Daftar akun</h2>
                    <p class=" mb-9 text-center">Buat akun anda sekarang</p>
                    <form action="#" id="formRegister">
                        @csrf
                        <div class="mb-3">
                            <label for="regisNisn" class="form-label">Username NISN</label>
                            <input type="text" name="regisNisn" id="regisNisn" class="form-control"
                                placeholder="Insert your NISN" required>
                        </div>
                        <div class="mb-3">
                            <label for="regisNisn" class="form-label">Nama Lengkap</label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Masukkan nama lengkap"  style="text-transform:uppercase"required>
                        </div>
                        <div class="mb-4">
                            <label for="regisPassword" class="form-label">Password</label>
                            <input type="password" name="regisPassword" id="regisPassword" class="form-control"
                                placeholder="Masukkan Password" required>
                        </div>
                        <div class="mb-4">
                            <label for="regisConfirmPw" class="form-label">Confirm Password</label>
                            <input type="password" name="regisConfrimPw" id="regisConfirmPw" class="form-control"
                                placeholder="Masukkan Password" required>
                            <div class="invalid-feedback">
                                Passwords do not match.
                            </div>
                        </div>
                        <button class="btn btn-primary d-none" type="button" id="SpinnerBtnAdd">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>
                        <button type="submit" id="btnSubmit"
                            class="btn btn-primary w-100 py-8 mb-4 rounded-2">Register</button>
                        <div class="d-flex align-items-center justify-content-center">
                            <p class="mb-0 fw-medium">Sudah punya akun ?</p>
                            <a href="{{ route('login') }}" class="text-primary fw-medium ms-2">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- <main> --}}
    {{-- </main> --}}
    <script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <!-- ---------------------------------------------- -->
    <!-- core files -->
    <!-- ---------------------------------------------- -->
    <script src="{{ asset('js/app.min.js') }}"></script>
    <script src="{{ asset('js/app.init.js') }}"></script>
    <script src="{{ asset('js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('libs/prismjs/prism.js') }}"></script>
    {{-- Form js --}}
    <script src="{{ asset('libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/forms/form-wizard.js') }}"></script>
    <script src="{{ asset('js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('js/app.min.js') }}"></script>
    <script src="{{ asset('libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script type="text/javascript" src="{{ asset('js/datatables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app/functions.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/sweetalert2.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/flatpickr.js') }}"></script>
</body>

<script>
    document.getElementById('formRegister').addEventListener('submit', function(event) {
        event.preventDefault();
        const password = document.getElementById('regisPassword').value;
        const confirmPassword = document.getElementById('regisConfirmPw').value;

        if (password !== confirmPassword) {
            document.getElementById('regisConfirmPw').classList.add('is-invalid');
        } else {
            document.getElementById('regisConfirmPw').classList.remove('is-invalid');
            // Submit the form or further processing here
            this.submit();
        }
    });

    $('#formRegister').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: '{{ route('registerAccount') }}',
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
            showMessage('error', 'Sorry! we failed to insert data')
            hideSpinner('SpinnerBtnAdd', 'btnSubmit');
        });
    });
</script>

</html>
