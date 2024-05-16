@extends('layouts.main')
@section('title', 'Pendaftaran Siswa')


@section('content')

<div class="container-fluid">

    <!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
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
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
    <div class="card">
        <div class="card-body">

          <h4 class="card-title">Multi-column ordering</h4>

          <p class="card-subtitle mb-3">
            On a per-column basis (i.e. order by a specific column
            and then a secondary column if the data in the first
            column is identical), through the
            <code> columns.orderData</code> option.
          </p>
          <div class="table-responsive">
            <table id="multi_col_order" class="table table-striped table-bordered display text-nowrap">
              <thead>
                <!-- start row -->
                <tr>
                  <th>First name</th>
                  <th>Last name</th>
                  <th>Position</th>
                  <th>Bukti Pembayaran</th>
                  <th>Office</th>
                  <th>detail</th>
                  <th>Action</th>

                </tr>
                <!-- end row -->
              </thead>
              <tbody>
                <!-- start row -->
                <tr>
                  <td>Tiger</td>
                  <td>Nixon</td>
                  <td>System Architect</td>
                  <td><a href="#">Edinburgh</a></td>
                  <td>$320,800</td>
                  <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  detail pembayaran
                  </button></td>
                  <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                   edit
                  </button></td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Garrett</td>
                  <td>Winters</td>
                  <td>Accountant</td>
                  <td>Tokyo</td>
                  <td>$170,750</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Ashton</td>
                  <td>Cox</td>
                  <td>Junior Technical Author</td>
                  <td>San Francisco</td>
                  <td>$86,000</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Cedric</td>
                  <td>Kelly</td>
                  <td>Senior Javascript Developer</td>
                  <td>Edinburgh</td>
                  <td>$433,060</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Airi</td>
                  <td>Satou</td>
                  <td>Accountant</td>
                  <td>Tokyo</td>
                  <td>$162,700</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Brielle</td>
                  <td>Williamson</td>
                  <td>Integration Specialist</td>
                  <td>New York</td>
                  <td>$372,000</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Herrod</td>
                  <td>Chandler</td>
                  <td>Sales Assistant</td>
                  <td>San Francisco</td>
                  <td>$137,500</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Rhona</td>
                  <td>Davidson</td>
                  <td>Integration Specialist</td>
                  <td>Tokyo</td>
                  <td>$327,900</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Colleen</td>
                  <td>Hurst</td>
                  <td>Javascript Developer</td>
                  <td>San Francisco</td>
                  <td>$205,500</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Sonya</td>
                  <td>Frost</td>
                  <td>Software Engineer</td>
                  <td>Edinburgh</td>
                  <td>$103,600</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Jena</td>
                  <td>Gaines</td>
                  <td>Office Manager</td>
                  <td>London</td>
                  <td>$90,560</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Quinn</td>
                  <td>Flynn</td>
                  <td>Support Lead</td>
                  <td>Edinburgh</td>
                  <td>$342,000</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Charde</td>
                  <td>Marshall</td>
                  <td>Regional Director</td>
                  <td>San Francisco</td>
                  <td>$470,600</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Haley</td>
                  <td>Kennedy</td>
                  <td>Senior Marketing Designer</td>
                  <td>London</td>
                  <td>$313,500</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Tatyana</td>
                  <td>Fitzpatrick</td>
                  <td>Regional Director</td>
                  <td>London</td>
                  <td>$385,750</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Michael</td>
                  <td>Silva</td>
                  <td>Marketing Designer</td>
                  <td>London</td>
                  <td>$198,500</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Paul</td>
                  <td>Byrd</td>
                  <td>Chief Financial Officer (CFO)</td>
                  <td>New York</td>
                  <td>$725,000</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Gloria</td>
                  <td>Little</td>
                  <td>Systems Administrator</td>
                  <td>New York</td>
                  <td>$237,500</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Bradley</td>
                  <td>Greer</td>
                  <td>Software Engineer</td>
                  <td>London</td>
                  <td>$132,000</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Dai</td>
                  <td>Rios</td>
                  <td>Personnel Lead</td>
                  <td>Edinburgh</td>
                  <td>$217,500</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Jenette</td>
                  <td>Caldwell</td>
                  <td>Development Lead</td>
                  <td>New York</td>
                  <td>$345,000</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Yuri</td>
                  <td>Berry</td>
                  <td>Chief Marketing Officer (CMO)</td>
                  <td>New York</td>
                  <td>$675,000</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Caesar</td>
                  <td>Vance</td>
                  <td>Pre-Sales Support</td>
                  <td>New York</td>
                  <td>$106,450</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Doris</td>
                  <td>Wilder</td>
                  <td>Sales Assistant</td>
                  <td>Sidney</td>
                  <td>$85,600</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Angelica</td>
                  <td>Ramos</td>
                  <td>Chief Executive Officer (CEO)</td>
                  <td>London</td>
                  <td>$1,200,000</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Gavin</td>
                  <td>Joyce</td>
                  <td>Developer</td>
                  <td>Edinburgh</td>
                  <td>$92,575</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Jennifer</td>
                  <td>Chang</td>
                  <td>Regional Director</td>
                  <td>Singapore</td>
                  <td>$357,650</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Brenden</td>
                  <td>Wagner</td>
                  <td>Software Engineer</td>
                  <td>San Francisco</td>
                  <td>$206,850</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Fiona</td>
                  <td>Green</td>
                  <td>Chief Operating Officer (COO)</td>
                  <td>San Francisco</td>
                  <td>$850,000</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Shou</td>
                  <td>Itou</td>
                  <td>Regional Marketing</td>
                  <td>Tokyo</td>
                  <td>$163,000</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Michelle</td>
                  <td>House</td>
                  <td>Integration Specialist</td>
                  <td>Sidney</td>
                  <td>$95,400</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Suki</td>
                  <td>Burks</td>
                  <td>Developer</td>
                  <td>London</td>
                  <td>$114,500</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Prescott</td>
                  <td>Bartlett</td>
                  <td>Technical Author</td>
                  <td>London</td>
                  <td>$145,000</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Gavin</td>
                  <td>Cortez</td>
                  <td>Team Leader</td>
                  <td>San Francisco</td>
                  <td>$235,500</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Martena</td>
                  <td>Mccray</td>
                  <td>Post-Sales support</td>
                  <td>Edinburgh</td>
                  <td>$324,050</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Unity</td>
                  <td>Butler</td>
                  <td>Marketing Designer</td>
                  <td>San Francisco</td>
                  <td>$85,675</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Howard</td>
                  <td>Hatfield</td>
                  <td>Office Manager</td>
                  <td>San Francisco</td>
                  <td>$164,500</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Hope</td>
                  <td>Fuentes</td>
                  <td>Secretary</td>
                  <td>San Francisco</td>
                  <td>$109,850</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Vivian</td>
                  <td>Harrell</td>
                  <td>Financial Controller</td>
                  <td>San Francisco</td>
                  <td>$452,500</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Timothy</td>
                  <td>Mooney</td>
                  <td>Office Manager</td>
                  <td>London</td>
                  <td>$136,200</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Jackson</td>
                  <td>Bradshaw</td>
                  <td>Director</td>
                  <td>New York</td>
                  <td>$645,750</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Olivia</td>
                  <td>Liang</td>
                  <td>Support Engineer</td>
                  <td>Singapore</td>
                  <td>$234,500</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Bruno</td>
                  <td>Nash</td>
                  <td>Software Engineer</td>
                  <td>London</td>
                  <td>$163,500</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Sakura</td>
                  <td>Yamamoto</td>
                  <td>Support Engineer</td>
                  <td>Tokyo</td>
                  <td>$139,575</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Thor</td>
                  <td>Walton</td>
                  <td>Developer</td>
                  <td>New York</td>
                  <td>$98,540</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Finn</td>
                  <td>Camacho</td>
                  <td>Support Engineer</td>
                  <td>San Francisco</td>
                  <td>$87,500</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Serge</td>
                  <td>Baldwin</td>
                  <td>Data Coordinator</td>
                  <td>Singapore</td>
                  <td>$138,575</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Zenaida</td>
                  <td>Frank</td>
                  <td>Software Engineer</td>
                  <td>New York</td>
                  <td>$125,250</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Zorita</td>
                  <td>Serrano</td>
                  <td>Software Engineer</td>
                  <td>San Francisco</td>
                  <td>$115,000</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Jennifer</td>
                  <td>Acosta</td>
                  <td>Junior Javascript Developer</td>
                  <td>Edinburgh</td>
                  <td>$75,650</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Cara</td>
                  <td>Stevens</td>
                  <td>Sales Assistant</td>
                  <td>New York</td>
                  <td>$145,600</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Hermione</td>
                  <td>Butler</td>
                  <td>Regional Director</td>
                  <td>London</td>
                  <td>$356,250</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Lael</td>
                  <td>Greer</td>
                  <td>Systems Administrator</td>
                  <td>London</td>
                  <td>$103,500</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Jonas</td>
                  <td>Alexander</td>
                  <td>Developer</td>
                  <td>San Francisco</td>
                  <td>$86,500</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Shad</td>
                  <td>Decker</td>
                  <td>Regional Director</td>
                  <td>Edinburgh</td>
                  <td>$183,000</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Michael</td>
                  <td>Bruce</td>
                  <td>Javascript Developer</td>
                  <td>Singapore</td>
                  <td>$183,000</td>
                </tr>
                <!-- end row -->
                <!-- start row -->
                <tr>
                  <td>Donna</td>
                  <td>Snider</td>
                  <td>Customer Support</td>
                  <td>New York</td>
                  <td>$112,000</td>
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
                data: {
                },
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
            })
</script>
@endsection
