@extends('master')
@section('content')
    <div class="container">
        <h3>Data Kecamatan</h3>
        <a href="{{ route('kecamatan.create') }}" class="btn btn-primary mb-2">Tambah</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Kecamatan</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kecamatan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kode }}</td>
                        <td>{{ $item->nama_kecamatan }}</td>
                        <td>
                            <input type="checkbox" name="status" id="status" {{ $item->status ? 'checked' : '' }}>
                            <form action="{{ route('kecamatan.status', $item) }}" method="post" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success">{{ $item->status ? 'Inactive' : 'Active' }}</button>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('kecamatan.edit', $item) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('kecamatan.destroy', $item) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No Data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection