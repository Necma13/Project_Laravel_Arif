@extends('layouts.master')

@section('title','Data Mahasiswa')

@section('judul','Data Mahasiswa')

@section("bc")
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Data Mahasiswa </li>
  </ol>
@endsection

@section('css')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset ('/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset ('/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset ('/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection


@section('content')
<div class="card">
    <div class="card-header">
     <a href="/Mahasiswa/form/" class="btn btn-primary"> <i class="fa fa-plus"></i>Tambah data </a>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>NO</th>
              <th>NIM</th>
              <th>Nama Lengkap</th>
              <th>Jurusan</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($mhs as $item)
            <tr>
                <td>{{$nomor++}}</td>
                <td>{{$item->nim}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->jurusans->kode}}-{{$item->jurusans->jurusan}}</td>
                <td>
                    <a href="/Mahasiswa/detail/{{$item->id}}"><i class="fa fa-eye"></i></a>
                    <a href="/Mahasiswa/edit/{{$item->id}}" class="btn btn-info btn-xs"><i class="fa fa-pen"></i></a>
                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#hapus{{$item->id}}">
                        <i class="fa fa-trash"></i>
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="hapus{{$item->id}}" tabindex="-1" aria-labelledby="hapus{{$item->id}}" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="hapus{{$item->id}}">Peringatan</h1>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin ingin menghapus jurusan <b>{{$item->nama}}</b>?
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form action="/Mahasiswa/{{$item->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                            </div>
                        </div>
                        </div>
                    </div>
                </td>
              </tr>
            @empty
            <tr>
                <td colspan="5">Tidak Ada data</td>
              </tr>
            @endforelse
            <tfoot>
                <tr>
                    <th>NO</th>
                    <th>NIM</th>
                    <th>Nama Lengkap</th>
                    <th>Jurusan</th>
                    <th>Action</th>
                </tr>
                </tfoot>
              </table>
          </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      Footer
    </div>
    <!-- /.card-footer-->
  </div>
@endsection

@section('js')
<!-- DataTables  & Plugins -->
<script src="{{ asset ('/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset ('/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset ('/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset ('/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset ('/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset ('/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset ('/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset ('/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset ('/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset ('/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset ('/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset ('/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endsection
