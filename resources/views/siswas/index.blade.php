@extends('layouts.template')

@section('content')
<div class="card-title">
    <h5>Data Siswa</h5>
    <p>Home / Data Siswa</p>    
</div>

@if(Session::get('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
@endif
@if(Session::get('deleted'))
    <div class="alert alert-warning">{{ Session::get('deleted') }}</div>
@endif

@if(Auth::user()->role !== 'ps')
<div class="d-flex justify-content-start mb-3">
    <a class="btn btn-secondary" href="{{ route('siswas.create') }}">Tambah</a>
</div>
@endif

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>nis</th>
                <th>nama</th>
                <th>Rombel</th>
                <th>Rayon</th>
                @if(Auth::user()->role !== 'ps')
                <th class="text-center">Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($student as $item)
            <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item['nis'] }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['rombel_id'] }}</td>
                    <td>{{ $item['rayon_id'] }}</td>
                    @if(Auth::user()->role !== 'ps')
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('siswas.edit', $item->id) }}" class="btn btn-primary me-3">Edit</a>
                        <form action="{{ route('siswas.delete', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
