@extends('layouts.template')

@section('content')
<div class="card-title">
    <h5>Data Rayon</h5>
    <p>Home / Data Rayon</p>    
</div>

@if(Session::get('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
@endif
@if(Session::get('deleted'))
    <div class="alert alert-warning">{{ Session::get('deleted') }}</div>
@endif

<div class="d-flex justify-content-start mb-3">
    <a class="btn btn-secondary" href="{{ route('rayons.create') }}">Tambah</a>
</div>

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Rayon</th>
                <th>Pembimbing Siswa</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($rayon as $item)
            <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item['rayon'] }}</td>
                    <td>{{ $item['user_id'] }}</td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('rayons.edit', $item->id) }}" class="btn btn-primary me-3">Edit</a>
                        <form action="{{ route('rayons.delete', $item->id) }}" method="POST">
                         @csrf
                         @method('DELETE')
                         <button type="submit" class="btn btn-danger">Hapus</button>
                     </form>                     
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection