@extends('layouts.main')
@section('content')
    <!--  Header End -->
    <!-- test git -->
    <div class="container-fluid">
        <div class="container-fluid">

            <div class="card">
                <div class="card-body">
                  <div class="row" id="containerCards">

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


        const imagePath = "{{ asset('images/register.jpg') }}";

        $.ajax({
                url: "{{ route('dashboard.getcard') }}",
                method: "GET",
                data: {

                },
                beforeSend: () => {
                    $('#containerCards').html()
                    // console.log(selectRoom)
                }
            })

            // TODO: kalau sempat buatkan dinamis image di card menu
            .done(res => {
                // console.log(res);
                const htmlElements = res.map(item =>
                `
              <div class="col-md-6" >

                    <div class="card" >
                        <img src="{{ asset('${item.card_img   }') }}" class="card-img-top rounded-0" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">${item.card_name}</h5>
                            <p class="card-text">${item.card_description}</p>
                            <a  class="btn btn-primary" onclick="redirectToUrl('${item.card_url}')">Klik untuk selengkapnya</a>
                        </div>
                    </div>
                </div>
            `).join('');

                // Setelah Anda membuat semua elemen HTML, tambahkan mereka ke dalam container yang diinginkan
                $('#containerCards').html(htmlElements);

            })

            function redirectToUrl(url) {
                  location.href = url;
              }
    </script>

@endsection

@section('script')
@endsection
