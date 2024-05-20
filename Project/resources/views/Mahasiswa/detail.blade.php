@extends('layouts.master')
@section('title', 'Detail Mahasiswa')
@section('judul', 'Detail Mahasiswa')
@section('bc')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Data Mahasiswa</a></li>
        <li class="breadcrumb-item active">Detail Mahasiswa</li>
    </ol>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Detail Mahasiswa</h5>
            <ul>
                <li>NIM: {{ $mhs->nim }}</li>
                <li>Nama: {{ $mhs->nama }}</li>
                <li>Tempat Lahir: {{ $mhs->tempat }}</li>
                <li>Tanggal Lahir: {{ $mhs->tanggal }}</li>
                <li>Alamat: {{ $mhs->alamat }}</li>
                <li>Jenis Kelamin: {{ $mhs->jk }}</li>
                <li>Jurusan: {{ $mhs->jurusan->jurusan }}</li>
                <li>Agama: {{ $mhs->agama }}</li>
            </ul>
            <a href="{{ url('/Mahasiswa/edit/'.$mhs->id) }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
@endsection
