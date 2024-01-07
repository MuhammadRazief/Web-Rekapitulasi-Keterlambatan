@extends('layouts.template')

@section('content')
    <div class="card-title">
        <h5>Tambah Data Siswa</h5>
        <p>Home / Data Siswa / Tambah Data Siswa</p>
    </div>

    <div class="container border py-4 rounded">
        <form action="{{ route('siswas.store') }}" method="POST" class="card p-5">
            @csrf

            @if(Session::get('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <div class="mb-3 row">
                <label for="nis" class="col-sm-2 col-form-label">NIS :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nis" name="nis">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Nama :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="rombel" class="col-sm-2 col-form-label">Rombel :</label>
                <div class="col-sm-10">
                    <select class="form-select" name="rombel_id" id="rombel_id" required>
                        <option selected disabled hidden>Pilih Rombel</option>
                        @foreach($rombels as $rombel)
                            <option value="{{ $rombel->rombel }}">{{ $rombel->rombel }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <!-- Bagian Form untuk Rayon -->
            <div class="mb-3 row">
                <label for="rayon_id" class="col-sm-2 col-form-label">Rayon :</label>
                <div class="col-sm-10">
                    <select class="form-select" name="rayon_id" id="rayon_id" required>
                        <option selected disabled hidden>Pilih Rayon</option>
                        @foreach($rayons as $rayon)
                            <option value="{{ $rayon->rayon }}">{{ $rayon->rayon }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-">Tambah Data</button>
        </form>
    </div>
@endsection
