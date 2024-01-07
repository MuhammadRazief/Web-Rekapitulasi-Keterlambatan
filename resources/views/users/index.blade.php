@extends('layouts.template')

@section('content')
    <div class="card-title">
        <h5>Data Users</h5>
        <p>Data / Data Users</p>    
    </div>
    <div id="msg-success"></div>

    <div class="mb-3">
        <a class="btn btn-secondary" href="{{ route('users.create') }}">Tambah</a>
    </div>

    @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if (Session::has('deleted'))
        <div class="alert alert-warning">{{ Session::get('deleted') }}</div>
    @endif
    
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($users as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->role }}</td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('users.edit', $item->id) }}" class="btn btn-primary me-3">Edit<i data-feather="edit"></i></a>
                        <form action="{{ route('users.delete', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
