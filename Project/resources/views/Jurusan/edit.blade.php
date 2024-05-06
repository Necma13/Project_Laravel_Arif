@extends('layouts.master')
@section('title','Edit Jurusan')
@section('judul','Edit Jurusan')
@section('bc')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Data Jurusan</a></li>
        <li class="breadcrumb-item active">Edit Jurusan</li>
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
            <form method="post" action="/jurusan/{{$jur->id}}">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label class="form-label">Kode Jurusan</label>
                    <input type="text" readonly value="{{$jur->kode}}" class="form-control" name="kode">
                </div>
                <div class="mb-3">
                    <label class="form-label">Jurusan</label>
                    <input type="text" value="{{$jur->jurusan}}" class="form-control" name="nama">
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
