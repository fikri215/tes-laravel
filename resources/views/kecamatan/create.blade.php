@extends('master')
@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h3>Tambah Data Kecamatan</h3>
        <form action="{{ route('kecamatan.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="kode">Kode</label>
                <input type="text" name="kode" class="form-control">
            </div>
            <div class="form-group mt-2">
                <label for="nama_kecamatan">Nama Kecamatan</label>
                <input type="text" name="nama_kecamatan" class="form-control">
            </div>
            <button class="btn btn-primary mt-2" type="submit">Simpan</button>
        </form>
    </div>
@endsection