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
        <h3>Tambah Data Provinsi</h3>
        <form action="{{ route('provinsi.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="kode">Kode</label>
                <input type="text" name="kode" class="form-control">
            </div>
            <div class="form-group mt-2">
                <label for="nama_provinsi">Nama Provinsi</label>
                <input type="text" name="nama_provinsi" class="form-control">
            </div>
            <button class="btn btn-primary mt-2" type="submit">Simpan</button>
        </form>
    </div>
@endsection