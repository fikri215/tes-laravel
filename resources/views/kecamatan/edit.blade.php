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
        <h3>Edit Data Kecamatan</h3>
        <form action="{{ route('kecamatan.update', $kecamatan) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="kode">Kode</label>
                <input type="text" name="kode" class="form-control" value="{{ $kecamatan->kode }}">
            </div>
            <div class="form-group mt-2">
                <label for="nama_kecamatan">Nama Kecamatan</label>
                <input type="text" name="nama_kecamatan" class="form-control" value="{{ $kecamatan->nama_kecamatan }}">
            </div>
            <button class="btn btn-primary mt-2" type="submit">Simpan</button>
        </form>
    </div>
@endsection