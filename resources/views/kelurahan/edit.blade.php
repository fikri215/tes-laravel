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
        <h3>Edit Data Kelurahan</h3>
        <form action="{{ route('kelurahan.update', $kelurahan) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="kode">Kode</label>
                <input type="text" name="kode" class="form-control" value="{{ $kelurahan->kode }}">
            </div>
            <div class="form-group mt-2">
                <label for="nama_kelurahan">Nama Kelurahan</label>
                <input type="text" name="nama_kelurahan" class="form-control" value="{{ $kelurahan->nama_kelurahan }}">
            </div>
            <div class="form-group mt-2">
                <label for="kode_kecamatan">Kecamatan</label>
                <select name="kode_kecamatan" id="kode_kecamatan" class="form-control">
                    @foreach ($kecamatan as $item)
                        <option value="{{ $item->kode }}"
                            {{ ($kelurahan->kode_kecamatan == $item->kode) ? 'selected' : ''}}>
                            {{ $item->nama_kecamatan }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-2">
                <label for="kode_provinsi">Provinsi</label>
                <select name="kode_provinsi" id="kode_provinsi" class="form-control">
                    @foreach ($provinsi as $item)
                        <option value="{{ $item->kode }}"
                            {{ ($kelurahan->kode_provinsi == $item->kode) ? 'selected' : ''}}>
                            {{ $item->nama_provinsi }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary mt-2" type="submit">Simpan</button>
        </form>
    </div>
@endsection