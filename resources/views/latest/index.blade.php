@extends('layouts.template')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <div class="card-title">
        <h5>Data Keterlambatan</h5>
        <p>Home / Data Keterlambatan</p>
    </div>

    @if(Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if(Session::get('deleted'))
        <div class="alert alert-warning">{{ Session::get('deleted') }}</div>
    @endif

    <div class="row justify-content-between mb-3">
        <div class="col-md-6">
            @if(Auth::user()->role !== 'ps')
                <a class="btn btn-secondary me-2" href="{{ route('latest.create') }}">Tambah</a>
                @endif
                <a class="btn btn-primary" href="">Export data keterlambatan</a>
        </div>
        <div class="col-md-6 text-end">
            <input type="text" id="searchInput" placeholder="Cari Nis/Nama" class="form-control">
        </div>
    </div>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="data-tab" data-bs-toggle="tab" data-bs-target="#data" type="button" role="tab" aria-controls="data" aria-selected="true">Keseluruhan Data</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="reka-tab" data-bs-toggle="tab" data-bs-target="#reka" type="button" role="tab" aria-controls="reka" aria-selected="false">Rekapitulasi Data</button>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="data" role="tabpanel" aria-labelledby="data-tab">
            <div class="row">
                <div class="col-md-12" id="tabelKeseluruhan">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Informasi</th>
                                @if(Auth::user()->role !== 'ps')
                                    <th class="text-center">Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($latest as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->date_time_late }}</td>
                                    <td>{{ $item->information }}</td>
                                    @if(Auth::user()->role !== 'ps')
                                        <td class="d-flex justify-content-center">
                                            <a href="{{ route('latest.edit', $item->id) }}" class="btn btn-primary me-3">Edit</a>
                                            <form action="{{ route('latest.delete', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                  
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="reka" role="tabpanel" aria-labelledby="reka-tab">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                <th>Jumlah Keterlambatan</th>
                                <th>Detail</th>
                                @if(Auth::user()->role !== 'ps')
                                    <th>Cetak</th>
                            </tr>
                        </thead>
                        @endif
                        <tbody>
                        
                            @php $siswaCount = []; $no = 1; @endphp
                            @foreach ($latest as $item)
                                @php
                                    $nis = substr($item->name, 0, strpos($item->name, ' - '));
                                    $nama = substr($item->name, strpos($item->name, ' - ') + 3);
                                    if (!isset($siswaCount[$nis])) {
                                        $siswaCount[$nis] = [
                                            'nama' => $nama,
                                            'jumlah' => 0,
                                            'ids' => [],
                                        ];
                                    }
                                    $siswaCount[$nis]['jumlah']++;
                                    $siswaCount[$nis]['ids'][] = $item->id;
                                @endphp
                            @endforeach

                            @foreach ($siswaCount as $nis => $siswa)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $nis }}</td>
                                    <td>{{ $siswa['nama'] }}</td>
                                    <td>{{ $siswa['jumlah'] }}</td>
                                    <td>
                                        
                                        @foreach ($siswa['ids'] as $key => $id)
                                        @if ($key === 0)
                                            <a href="{{ route('latest.detail', $id) }}">Lihat</a>
                                        @endif
                                    @endforeach
                                    @if(Auth::user()->role !== 'ps')
                                      
                                    </td>
                                    <td>
                                       
                                        @if ($siswa['jumlah'] >= 3)
                                        <a href="{{ route('latest.pdf', $siswa['ids'][0]) }}" class="btn btn-primary">Cetak Surat</a>
                                    @endif
                                    </td>
                                    
                                </tr>
                             
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                   
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('searchInput').addEventListener('input', function() {
            const keyword = this.value.toLowerCase();
            const activeTab = document.querySelector('.tab-pane.active');

            if (activeTab.id === 'data') {
                const rows = document.querySelectorAll('#tabelKeseluruhan table tbody tr');
                rows.forEach(row => {
                    const name = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                    if (name.includes(keyword)) {
                        row.style.display = 'table-row';
                    } else {
                        row.style.display = 'none';
                    }
                });
            } else if (activeTab.id === 'reka') {
                const rows = document.querySelectorAll('#reka table tbody tr');
                rows.forEach(row => {
                    const nis = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                    const nama = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                    if (nis.includes(keyword) || nama.includes(keyword)) {
                        row.style.display = 'table-row';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }
        });
    </script>
@endsection
