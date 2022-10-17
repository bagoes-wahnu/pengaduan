<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Pengaduan</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset("plugins/fontawesome-free/css/all.min.css")}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset("plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}">
  <link rel="stylesheet" href="{{asset("plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}">
  <link rel="stylesheet" href="{{asset("plugins/datatables-buttons/css/buttons.bootstrap4.min.css")}}">
  <link rel="stylesheet" href="{{asset("plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css")}}">
  <link rel="stylesheet" href="{{asset("plugins/toastr/toastr.min.css")}}">
  <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset("dist/css/adminlte.min.css")}}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        {{-- <a href="{{asset("/")}}" class="nav-link">Home</a> --}}
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-user-circle"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider mt-2"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> Profil
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-sign-out-alt"></i> Logout
          </a>
          <div class="dropdown-divider mb-2"></div>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4">
    <a href="{{asset("/")}}" class="brand-link">
      <img src="{{asset("dist/img/DPRKPP-02.png")}}" alt="Logo" class="brand-image img-size-250">
      <span class="brand-text font-weight-light text-primary">DPRKPP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{asset("/")}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pengaduan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Pengaduan</li> --}}
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-10 offset-md-1">
                    {{-- <form action="{{ route('pertelaan.search.json') }}" method="get"> --}}
                    <form action="{{url("/api/pengaduan/search_json")}}" id="input-search" method="get">
                    <div class="row">
                      <div class="col-3">
                        <div class="form-group">
                          <label>Pilih Kolom:</label>
                          <select class="select2" name="kolom" id="kolom" style="width: 100%;">
                              <option value="id">ID</option>
                              <option value="nama_pengadu">/Nama Pengadu</option>
                              <option value="alamat_pengadu">Alamat Pengadu</option>
                              <option value="nama_teradu">Nama Teradu</option>
                              <option value="alamat_teradu">Alamat Teradu</option>
                              <option value="kelurahan">Kelurahan</option>
                              <option value="kecamatan">Kecamatan</option>
                              <option value="no_skrk">No SKRK</option>
                              <option value="no_imb">No IMB</option>
                              <option value="status_pengaduan">Status Pengaduan</option>
                              <option value="latitude">Latitude</option>
                              <option value="longitude">Longitude</option>
                              <option value="keterangan">Keterangan</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="form-group">
                          <label>Masukkan Nilai:</label>
                          <input type="text" name="nilai" id="nilai" class="form-control"/>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="form-group">
                          <label>Cari Data:</label>
                          <div class="input-group-append">
                              <button type="submit" class="btn btn-default">
                                  <i class="fa fa-search"></i>
                              </button>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                  </form>
                  <button type="button" onclick="create_json()" class="btn btn-success" data-toggle="modal" data-target="#modal-create">Tambah data</button>  
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    {{-- <th>No SKRK</th> --}}
                    <th>Nama Pengadu</th>
                    <th>Alamat Pengadu</th>
                    <th>Nama Teradu</th>
                    <th>Alamat Teradu</th>
                    <th>Kelurahan</th>
                    <th>Kecamatan</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<div class="modal fade" id="modal-default">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Detail Data Pengaduan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="modal-body" class="modal-body">
        <div class="row">
          <div class="col-12">
            <div id="modal-table" class="table-responsive">
              
            </div>
          </div>
          <!-- /.col -->
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-create">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data Pengaduan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{-- <section class="content"> --}}
          <div class="row">
            <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-body" id="create-modal">

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        {{-- </section> --}}
      </div>
      <div class="modal-footer-create justify-content-between">
        
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-lg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Data Pengaduan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{-- <section class="content"> --}}
          <div class="row">
            <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-body" id="edit-modal">

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        {{-- </section> --}}
      </div>
      <div class="modal-footer-edit justify-content-between">
        
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-sm">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Hapus Data Pengaduan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Yakin Menghapus Data ?</p>
      </div>
      <div class="modal-footer-alert justify-content-between">
        
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!-- jQuery -->
<script src="{{asset("plugins/jquery/jquery.min.js")}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset("plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset("plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{asset("plugins/datatables-responsive/js/dataTables.responsive.min.js")}}"></script>
<script src="{{asset("plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}"></script>
<script src="{{asset("plugins/datatables-buttons/js/dataTables.buttons.min.js")}}"></script>
<script src="{{asset("plugins/datatables-buttons/js/buttons.bootstrap4.min.js")}}"></script>
<script src="{{asset("plugins/jszip/jszip.min.js")}}"></script>
<script src="{{asset("plugins/pdfmake/pdfmake.min.js")}}"></script>
<script src="{{asset("plugins/pdfmake/vfs_fonts.js")}}"></script>
<script src="{{asset("plugins/datatables-buttons/js/buttons.html5.min.js")}}"></script>
<script src="{{asset("plugins/datatables-buttons/js/buttons.print.min.js")}}"></script>
<script src="{{asset("plugins/datatables-buttons/js/buttons.colVis.min.js")}}"></script>
<script src="{{asset("plugins/sweetalert2/sweetalert2.min.js")}}"></script>
<script src="{{asset("plugins/toastr/toastr.min.js")}}"></script>
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset("dist/js/adminlte.min.js")}}"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $('.select2').select2()
  });
	let baseUrl = "{{asset('/')}}";
	console.log(baseUrl);
  $('.toastrDefaultSuccess').click(function() {
    toastr.success('Data Di Update.')
  });
	$(document).ready(function () {
    $('#id_create').val('');
    $('#kelurahan_create').val('');
    $('#kecamatan_create').val('');
    console.log($('#id_create').val());
		table()
	});
  function table() {
    // $('#id_create').val('');
    // $('#kelurahan_create').val('');
    // $('#kecamatan_create').val('');
    // console.log($('#id_create').val());
    $('#example2').DataTable({
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        "dom": 'Bfrtip',
        "bDestroy": true,
        "paging": true,
        "lengthChange": false,
        // "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "processing": true,
        "serverSide": false,
        "ajax": {
            "url": '{{ route('pengaduan.json') }}',
            // "dataType": "json",
            // "type": "GET",
            // "data":{ _token: "{{csrf_token()}}"}
        },
        "order":[0,'asc'],
        "columns": [
            // {data: 'DT_RowIndex', name: 'id'},
            {data: 'id', name: 'id'},
            {data: 'nama_pengadu'},
            {data: 'alamat_pengadu'},
            {data: 'nama_teradu'},
            {data: 'alamat_teradu'},
            {data: 'kelurahan'},
            {data: 'kecamatan'},
            {data: 'action', orderable: false, searcable: false}
        ],
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
  }
  function show_json(id){
    // console.log($('#gid').val(data.gid));
    console.log(id)
    $.ajax({
        type: "GET",
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
          "Authorization":"Bearer " + localStorage.getItem("token")
        },
        url: baseUrl+"api/pengaduan/show_json/"+id,
        success: function (response) {
          res = response;
          if (res.no_skrk == null) {res.no_skrk = ""}
          if (res.nama_pengadu == null) {res.nama_pengadu = ""}
          if (res.alamat_pengadu == null) {res.alamat_pengadu = ""}
          if (res.nama_teradu == null) {res.nama_teradu = ""}
          if (res.alamat_teradu == null) {res.alamat_teradu = ""}
          if (res.no_imb == null) {res.no_imb = ""}
          if (res.latitude == null) {res.latitude = ""}
          if (res.longitude == null) {res.longitude = ""}
          if (res.keterangan == null) {res.keterangan = ""}
          if (res.status_pengaduan == null) {res.status_pengaduan = ""}
          if (res.file_progress1 == null) {res.file_progress1 = ""}
          if (res.file_progress2 == null) {res.file_progress2 = ""}
          if (res.file_progress3 == null) {res.file_progress3 = ""}
          console.log(res);
              $('#modal-table').html(
                `<table class="table">
                  <tr>
                    <th>No SKRK</th>
                    <td>`+res.no_skrk+`</td>
                  </tr>
                  <tr>
                    <th>Nama Pengadu</th>
                    <td>`+res.nama_pengadu+`</td>
                  </tr>
                  <tr>
                    <th>Alamat Pengadu</th>
                    <td>`+res.alamat_pengadu+`</td>
                  </tr>
                  <tr>
                    <th>Nama Teradu</th>
                    <td>`+res.nama_teradu+`</td>
                  </tr>
                  <tr>
                    <th>Alamat Teradu</th>
                    <td>`+res.alamat_teradu+`</td>
                  </tr>
                  <tr>
                    <th>Kelurahan</th>
                    <td>`+res.kelurahan+`</td>
                  </tr>
                  <tr>
                    <th>Kecamatan</th>
                    <td>`+res.kecamatan+`</td>
                  </tr>
                  <tr>
                    <th>No IMB</th>
                    <td>`+res.no_imb+`</td>
                  </tr>
                  <tr>
                    <th>Latitude</th>
                    <td>`+res.latitude+`</td>
                  </tr>
                  <tr>
                    <th>Longitude</th>
                    <td>`+res.longitude+`</td>
                  </tr>
                  <tr>
                    <th>Keterangan</th>
                    <td>`+res.keterangan+`</td>
                  </tr>
                  <tr>
                    <th>Status Pengaduan</th>
                    <td>`+res.status_pengaduan+`</td>
                  </tr>
                  <tr>
                    <th>File Dokumen</th>
                    <td><a href="{{asset("storage/foto_dokumen/`+res.foto_dokumen+`")}}" target="_blank">`+res.foto_dokumen+`</a></td>
                  </tr>
                  <tr>
                    <th>File Lapangan</th>
                    <td><a href="{{asset("storage/foto_lapangan/`+res.foto_lapangan+`")}}" target="_blank">`+res.foto_lapangan+`</a></td>
                  </tr>
                </table>`
              )
              $('.modal-footer').html(
                `
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                `
              )
        }
    });
  }
  function create_json(){
    // console.log($('#gid').val(data.gid));
    // console.log($('#id_create').val());
    console.log('create')
    $('#create-modal').html(
        `
        <form action="`+baseUrl+`"api/pengaduan/store_json/" id="input-pengaduan" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="inputClientCompany">No SKRK</label>
          <input type="text" name="no_skrk" id="no_skrk_create" class="form-control">
        </div>
        <div class="form-group">
            <label for="inputClientCompany">No IMB</label>
            <input type="text" name="no_imb" id="no_imb_create" class="form-control">
        </div>
        <div class="form-group">
            <label for="inputClientCompany">Nama Pengadu</label>
            <input type="text" name="nama_pengadu" id="nama_pengadu_create" class="form-control">
        </div>
        <div class="form-group">
          <label for="inputDescription">Alamat Pengadu</label>
          <textarea name="alamat_pengadu" id="alamat_pengadu_create" class="form-control" rows="4"></textarea>
        </div>
        <div class="form-group">
            <label for="inputClientCompany">Nama Pengadu</label>
            <input type="text" name="nama_teradu" id="nama_teradu_create" class="form-control">
        </div>
        <div class="form-group">
          <label for="inputDescription">Alamat Pengadu</label>
          <textarea name="alamat_teradu" id="alamat_teradu_create" class="form-control" rows="4"></textarea>
        </div>
        <div class="form-group">
            <label for="inputClientCompany">Kelurahan</label>
            <input type="text" name="kelurahan" id="kelurahan_create" class="form-control">
        </div>
        <div class="form-group">
            <label for="inputProjectLeader">Kecamatan</label>
            <input type="text" name="kecamatan" id="kecamatan_create" class="form-control">
        </div>
        <div class="form-group">
            <label for="inputClientCompany">Latitude</label>
            <input type="text" name="latitude" id="latitude_create" class="form-control">
        </div>
        <div class="form-group">
            <label for="inputClientCompany">Longitude</label>
            <input type="text" name="longitude" id="longitude_create" class="form-control">
        </div>
        <div class="form-group">
          <label for="inputDescription">Keterangan</label>
          <textarea name="keterangan" id="keterangan_create" class="form-control" rows="4"></textarea>
        </div>
        <div class="form-group">
          <label for="inputStatus">Status Pengaduan</label>
          <select id="status_pengaduan_create" name="status_pengaduan" class="form-control custom-select">
            <option value="" selected></option>
            <option value="Sudah Diproses">Sudah Diproses</option>
            <option value="Belum Diproses">Belum Diproses</option>
          </select>
        </div>
        <div class="form-group">
            <label for="inputProjectLeader">File Dokumen</label>
            <input type="file" name="file_dokumen" id="file_dokumen_create" class="form-control">
        </div>
        <div class="form-group">
            <label for="inputProjectLeader">File Lapangan</label>
            <input type="file" name="file_lapangan" id="file_lapangan_create" class="form-control">
        </div>
        `
    )
    $('.modal-footer-create').html(
        `
        <button type="button" class="btn btn-default ml-3" data-dismiss="modal">Close</button>
        <button type="button" onclick="store_json()" class="btn btn-success float-right mb-3 mr-3 toastrDefaultSuccess">Save changes</button>
        </form>
        `
    )
  }
  function edit_json(id){
    // console.log($('#gid').val(data.gid));
    console.log(id)
    $('#id').val(id)
    console.log($('#id').val());
    $.ajax({
        type: "GET",
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
          "Authorization":"Bearer " + localStorage.getItem("token")
        },
        url: baseUrl+"api/pengaduan/show_json/"+id,
        success: function (response) {
          res = response;
          if (res.no_skrk == null) {res.no_skrk = ""}
          if (res.nama_pengadu == null) {res.nama_pengadu = ""}
          if (res.alamat_pengadu == null) {res.alamat_pengadu = ""}
          if (res.nama_teradu == null) {res.nama_teradu = ""}
          if (res.alamat_teradu == null) {res.alamat_teradu = ""}
          if (res.kelurahan == null) {res.kelurahan = ""}
          if (res.kecamatan == null) {res.kecamatan = ""}
          if (res.no_imb == null) {res.no_imb = ""}
          if (res.latitude == null) {res.latitude = ""}
          if (res.longitude == null) {res.longitude = ""}
          if (res.keterangan == null) {res.keterangan = ""}
          if (res.status_pengaduan == null) {res.status_pengaduan = ""}
          if (res.file_progress1 == null) {res.file_progress1 = ""}
          if (res.file_progress2 == null) {res.file_progress2 = ""}
          if (res.file_progress3 == null) {res.file_progress3 = ""}
          console.log(res);
          $('#edit-modal').html(
            `<form action="`+baseUrl+`"api/pengaduan/store_json/"`+id+`" id="input-pengaduan" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" id="id" class="form-control" value="`+res.id+`">
            <input type="hidden" name="emp_file_lapangan" id="emp_file_lapangan">
            <input type="hidden" name="emp_file_dokumen" id="emp_file_dokumen">
            <div class="form-group">
                <label for="inputClientCompany">No SKRK</label>
                <input type="text" name="no_skrk" id="no_skrk" value="`+res.no_skrk+`" class="form-control">
            </div>
            <div class="form-group">
                <label for="inputClientCompany">No IMB</label>
                <input type="text" name="no_imb" id="no_imb" value="`+res.no_imb+`" class="form-control">
            </div>
            <div class="form-group">
              <label for="inputClientCompany">Nama Pengadu</label>
              <input type="text" name="nama_pengadu" id="nama_pengadu" value="`+res.nama_pengadu+`" class="form-control">
            </div>
            <div class="form-group">
              <label for="inputDescription">Alamat Pengadu</label>
              <textarea name="alamat_pengadu" id="alamat_pengadu" class="form-control" rows="4">`+res.alamat_pengadu+`</textarea>
            </div>
            <div class="form-group">
              <label for="inputClientCompany">Nama Teradu</label>
              <input type="text" name="nama_teradu" id="nama_teradu" value="`+res.nama_teradu+`" class="form-control">
            </div>
            <div class="form-group">
              <label for="inputDescription">Alamat Teradu</label>
              <textarea name="alamat_teradu" id="alamat_teradu" class="form-control" rows="4">`+res.alamat_teradu+`</textarea>
            </div>
            <div class="form-group">
                <label for="inputClientCompany">Kelurahan</label>
                <input type="text" name="kelurahan" id="kelurahan" class="form-control" value="`+res.kelurahan+`">
            </div>
            <div class="form-group">
                <label for="inputProjectLeader">Kecamatan</label>
                <input type="text" name="kecamatan" id="kecamatan" class="form-control" value="`+res.kecamatan+`">
            </div>
            <div class="form-group">
                <label for="inputClientCompany">Latitude</label>
                <input type="text" name="latitude" id="latitude" value="`+res.latitude+`" class="form-control">
            </div>
            <div class="form-group">
                <label for="inputClientCompany">Longitude</label>
                <input type="text" name="longitude" id="longitude" value="`+res.longitude+`" class="form-control">
            </div>
            <div class="form-group">
              <label for="inputDescription">Keterangan</label>
              <textarea name="keterangan" id="keterangan" class="form-control" rows="4">`+res.keterangan+`</textarea>
            </div>
            <div class="form-group">
              <label for="inputStatus">Status Pengaduan</label>
              <select id="status_pengaduan" name="status_pengaduan" class="form-control custom-select">
                <option value="`+res.status_pengaduan+`" selected>`+res.status_pengaduan+`</option>
                <option value="Proses">Proses</option>
                <option value="Selesai">Selesai</option>
              </select>
            </div>
            <div class="form-group">
                <label for="inputProjectLeader">File Dokumen</label>
                <input type="file" name="file_dokumen" id="file_dokumen" class="form-control" value="`+res.file_dokumen+`">
            </div>
            <div class="form-group">
                <label for="inputProjectLeader">Foto Lapangan</label>
                <input type="file" name="file_lapangan" id="file_lapangan" class="form-control" value="`+res.file_lapangan+`">
            </div>`
          )
          $("#emp_file_lapangan").val(res.foto_lapangan)
          $("#emp_file_dokumen").val(res.foto_dokumen)
          $('.modal-footer-edit').html(
            `<button type="button" class="btn btn-default ml-3" data-dismiss="modal">Close</button>
            <button type="button" onclick="store_json()" class="btn btn-success float-right mb-3 mr-3 toastrDefaultSuccess">Save changes</button>
            </form>`
          )
        }
    });
  }
  function store_json(param){
    console.log(param);
    console.log($('#id_create').val());
    console.log($('#id').val());
    // if (param == 'create') {
    //     var data = {
    //         id: $("#id_create").val(),
    //         no_skrk: $("#no_skrk_create").val(),
    //         no_imb: $("#no_imb_create").val(),
    //         nama_pengadu: $("#nama_pengadu_create").val(),
    //         alamat_pengadu: $("#alamat_pengadu_create").val(),
    //         kelurahan: $("#kelurahan_create").val(),
    //         kecamatan: $("#kecamatan_create").val(),
    //         nama_teradu: $("#nama_teradu_create").val(),
    //         alamat_teradu: $("#alamat_teradu_create").val(),
    //     }
    // } else if(param == 'edit') {
    //     var data = {
    //         id: $("#id").val(),
    //         no_skrk: $("#no_skrk").val(),
    //         no_imb: $("#no_imb").val(),
    //         nama_pengadu: $("#nama_pengadu").val(),
    //         alamat_pengadu: $("#alamat_pengadu").val(),
    //         kelurahan: $("#kelurahan").val(),
    //         kecamatan: $("#kecamatan").val(),
    //         nama_teradu: $("#nama_teradu").val(),
    //         alamat_teradu: $("#alamat_teradu").val(),
    //     }
    // }
    const fd = new FormData(document.getElementById('input-pengaduan'));
    console.log(data)
    $.ajax({
        type: "POST",
        processData: false, 
        contentType: false,
        dataType: "json",
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
          "Authorization":"Bearer " + localStorage.getItem("token")
        },
        data: fd,
        url: baseUrl+"api/pengaduan/store_json",
        success: function (response) {
          // res = response;
          // console.log(res);
          // Swal.fire("Success!", "Data berhasil "+resSwal, "success");
          $('#id_create').val('');
          $('#no_skrk_create').val('');
          $('#kelurahan_create').val('');
          $('#kecamatan_create').val('');
          $('#id').val('');
          $('#no_skrk').val('');
          $('#kelurahan').val('');
          $('#kecamatan').val('');
          $('#modal-create').modal('hide')
          $('#modal-lg').modal('hide')
          table()
        }
    });
  }
  function alert(id) {
    $('.modal-footer-alert').html(
      `
        <button type="button" class="btn btn-default ml-3" data-dismiss="modal">Close</button>
        <button type="button" onclick="delete_json(`+id+`)" class="btn btn-danger float-right mb-3 mr-3">Hapus</button>
      `
    )
  }
  function delete_json(id){
    $('#modal-sm').modal('hide')
    console.log(id)
    alert('delete');
    $.ajax({
        type: "DELETE",
        dataType: "json",
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
          "Authorization":"Bearer " + localStorage.getItem("token")
        },
        url: baseUrl+"api/pengaduan/delete_json/"+id,
        success: function (response) {
          // res = response;
          // console.log(res);
          // Swal.fire("Success!", "Data berhasil "+resSwal, "success");
          // $('#modal-lg').modal('hide')
          table()
        }
    });
  }
  $("#input-search").on("submit", function (e) {
    var dataString = $(this).serialize();
    console.log(dataString);
    $.ajax({
      type: "GET",
      url: baseUrl+"api/pengaduan/search_json",
      data: dataString,
      success: function () {
        // Display message back to the user here
        // search()
        // res = response;
        // console.log(res);
        $('#example2').DataTable({
        "dom": 'Bfrtip',
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        "bDestroy": true,
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "processing": true,
        "serverSide": false,
        "ajax": {
            "url": baseUrl+"api/pengaduan/search_json?"+dataString,
            "dataType": "json",
            "type": "GET",
            "data":{ _token: "{{csrf_token()}}"}
        },
        "order":[0,'asc'],
        "columns": [
            // {data: 'DT_RowIndex', name: 'id'},
            {data: 'id', name: 'id'},
            {data: 'nama_pengadu'},
            {data: 'alamat_pengadu'},
            {data: 'nama_teradu'},
            {data: 'alamat_teradu'},
            {data: 'kelurahan'},
            {data: 'kecamatan'},
            {data: 'action', orderable: false, searcable: false}
        ],
        }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
      }
    });
 
    e.preventDefault();
  });
</script>
</body>
</html>
