@extends('layouts.template')

@section('content')
<div class="card-title">
    <h5>Tambah Data Rayon</h5>
    <p>Home / Data Rayon /<span> Tambah Data Rayon</span></p>    
</div>
<div class="container border py-4 rounded">
    <form action="{{ route('rayons.store') }}" method="POST" class="card p-5">
        @csrf

        @if(Session::get('success'))
            <div class="alert alert-success"> {{ Session::get('success') }} </div>
        @endif
        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">rayon :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="rayon" name="rayon">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="user_id" class="col-sm-2 col-form-label">Pembimbing Siswa :</label>
            <div class="col-sm-10">
                <select class="form-select" name="user_id"  required>
                    <option selected disabled hidden>Pilih  </option>
                    @foreach($ps as $item)
                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Tambah Data</button>
    </form>
@endsection