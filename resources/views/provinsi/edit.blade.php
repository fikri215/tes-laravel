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
        <h3>Edit Data Provinsi</h3>
        <form action="{{ route('provinsi.update', $provinsi) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="kode">Kode</label>
                <input type="text" name="kode" class="form-control" value="{{ $provinsi->kode }}">
            </div>
            <div class="form-group mt-2">
                <label for="nama_provinsi">Nama Provinsi</label>
                <input type="text" name="nama_provinsi" class="form-control" value="{{ $provinsi->nama_provinsi }}">
            </div>
            <button class="btn btn-primary mt-2" type="submit">Simpan</button>
        </form>
    </div>
@endsection