@extends('master')
@section('content')
    <div class="container">
        <h3>Data Provinsi</h3>
        <a href="{{ route('provinsi.create') }}" class="btn btn-primary mb-2">Tambah</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Provinsi</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($provinsi as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kode }}</td>
                        <td>{{ $item->nama_provinsi }}</td>
                        <td>
                            <input type="checkbox" name="status" id="status" {{ $item->status ? 'checked' : '' }}>
                            <form action="{{ route('provinsi.status', $item) }}" method="post" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success">{{ $item->status ? 'Inactive' : 'Active' }}</button>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('provinsi.edit', $item) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('provinsi.destroy', $item) }}" method="post" class="d-inline">
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