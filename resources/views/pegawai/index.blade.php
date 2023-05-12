@extends('master')
@section('content')
    <div class="container">
        <h3>Data Pegawai</h3>
        <a href="{{ route('pegawai.create') }}" class="btn btn-primary mb-2">Tambah</a>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Pegawai</th>
                        <th>Tempat Lahir</th>
                        <th>Tgl Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Agama</th>
                        <th>Alamat</th>
                        <th>Kelurahan</th>
                        <th>Kecamatan</th>
                        <th>Provinsi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pegawai as $item)
                        <tr>
                            <td>{{ $item->nama_pegawai }}</td>
                            <td>{{ $item->tempat_lahir }}</td>
                            <td>{{ \Carbon\Carbon::create($item->tgl_lahir)->format('d-M-Y') }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->agama }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->kelurahan->nama_kelurahan }}</td>
                            <td>{{ $item->kelurahan->kecamatan->nama_kecamatan }}</td>
                            <td>{{ $item->kelurahan->provinsi->nama_provinsi }}</td>
                            <td>
                                <a href="{{ route('pegawai.edit', $item) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('pegawai.destroy', $item) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">No Data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection