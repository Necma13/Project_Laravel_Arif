@extends('layouts.master')
@section('title','Edit Mahasiswa')
@section('judul','Edit Mahasiswa')
@section('bc')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Data Mahasiswa</a></li>
        <li class="breadcrumb-item active">Edit Mahasiswa</li>
    </ol>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">


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
            <form method="post" action="/Mahasiswa/{{$mhs->id}}">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label class="form-label">NIM</label>
                    <input type="text" readonly value="{{$mhs->nim}}" class="form-control" name="nim">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" value="{{$mhs->nama}}" class="form-control" name="nama">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tempat Lahir</label>
                    <input type="text" value="{{$mhs->tempat}}" class="form-control" name="tempat">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" value="{{$mhs->tanggal}}" class="form-control" name="tanggal">
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <input type="text" value="{{$mhs->alamat}}" class="form-control" name="alamat">
                </div>
                <div class="mb-3">
                    <label class="form-label">Pilih Jenis Kelamin</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jk" id="laki-laki" value="laki-laki">
                        <label class="form-check-label" for="laki-laki">Laki-Laki</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jk" id="perempuan" value="perempuan">
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jk" id="lainnya" value="lainnya">
                        <label class="form-check-label" for="lainnya">Lainnya</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Pilih Jurusan</label>
                    <select name="jurusans_id" value="{{$mhs->jurusans_id}}" class="form-control" id="">
                        <option value="">-Pilih Jurusan-</option>
                        @foreach ($jur as $item)
                            <option value="{{ $item->id }}">{{ $item->jurusan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Pilih Agama</label>
                    <select name="agama"  value="{{$mhs->agama}}" class="form-control" id="" >
                        <option value="">-Pilih Agama-</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="lainnya">Lainnya</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Edit Data</button>
            </form>
        </div>
        <!-- /.card-body -->
        {{-- <div class="card-footer">
        Footer
        </div> --}}
        <!-- /.card-footer-->
    </div>
@endsection
