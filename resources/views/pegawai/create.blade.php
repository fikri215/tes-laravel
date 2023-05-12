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
        <h3>Tambah Data Pegawai</h3>
        <form action="{{ route('pegawai.store') }}" method="post">
            @csrf
            <div class="form-group mt-2">
                <label for="nama_pegawai">Nama Pegawai</label>
                <input type="text" name="nama_pegawai" class="form-control">
            </div>
            <div class="form-group mt-2">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control">
            </div>
            <div class="form-group mt-2">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" class="form-control">
            </div>
            <div class="form-group mt-2">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                </select>
            </div>
            <div class="form-group mt-2">
                <label for="agama">Agama</label>
                <input type="text" name="agama" class="form-control">
            </div>
            <div class="form-group mt-2">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" class="form-control">
            </div>
            <div class="form-group mt-2">
                <label for="kode_kelurahan">Kelurahan</label>
                <select name="kode_kelurahan" id="kode_kelurahan" class="form-control">
                    @foreach ($kelurahan as $item)
                        <option value="{{ $item->kode }}">{{ $item->nama_kelurahan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-2">
                <label for="kode_provinsi">Provinsi</label>
                <select name="kode_provinsi" id="kode_provinsi" class="form-control">
                    @foreach ($provinsi as $item)
                        <option value="{{ $item->kode }}">{{ $item->nama_provinsi }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary mt-2" type="submit">Simpan</button>
        </form>
    </div>
@endsection