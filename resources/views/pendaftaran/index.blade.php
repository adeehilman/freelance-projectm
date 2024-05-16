@extends('layouts.main')
@section('title', 'Pendaftaran Siswa')


@section('content')
    <!--  Header End -->
    <div class="container-fluid" >
        <div class="card" >

            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Jalur pendaftaran yang tersedia</h5>
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
                    const formattedStartDate = startDate.toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });
                    const formattedendDate = startDate.toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });

                    return `
                        <div class="col-sm-4">
                            <div class="card" style="margin:5px;  overflow:auto;">

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
                                            <a href="{{ route('/form-pendaftaran')}}" data-id${item.jurusan_id} class="btn btn-primary mt-2">DAFTAR</a>
                                        </div>

                                    </div>
                            </div>
                        </div>
                    `;
                }).join('');

                // Setelah Anda membuat semua elemen HTML, tambahkan mereka ke dalam container yang diinginkan
                $('#containerCards').html(htmlElements);
            })


    </script>
@endsection
