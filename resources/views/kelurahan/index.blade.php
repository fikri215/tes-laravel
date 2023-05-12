@extends('master')
@section('content')
    <div class="container">
        <h3>Data Kelurahan</h3>
        <a href="{{ route('kelurahan.create') }}" class="btn btn-primary mb-2">Tambah</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Kelurahan</th>
                    <th>Nama Kecamatan</th>
                    <th>Nama Provinsi</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kelurahan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kode }}</td>
                        <td>{{ $item->nama_kelurahan }}</td>
                        <td>{{ $item->kecamatan->nama_kecamatan }}</td>
                        <td>{{ $item->provinsi->nama_provinsi }}</td>
                        <td>
                            <input type="checkbox" name="status" id="status" {{ $item->status ? 'checked' : '' }}>
                            <form action="{{ route('kelurahan.status', $item) }}" method="post" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success">{{ $item->status ? 'Inactive' : 'Active' }}</button>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('kelurahan.edit', $item) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('kelurahan.destroy', $item) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No Data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection