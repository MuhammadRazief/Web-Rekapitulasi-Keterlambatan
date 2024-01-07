@extends('layouts.template')

@section('content')
<div class="card-title">
    <h5>Edit Data latest</h5>
    <p>Home / Data latest / Edit Data latest</p>    
</div>

<form action="{{ route('latest.update', $latest->id) }}" method="post" class="card p-5">
    @csrf
    @method('PATCH')

    @if ($errors->any())
        <ul class="alert alert-danger p-3">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <div class="mb-3 row">
        <label for="Students" class="col-sm-2 col-form-label">Siswa:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="Students" name="Students" value="{{ $latest->name }}">
        </div>
    </div>
        
        <div class="mb-3 row">
            <label for="date_time_late" class="col-sm-2 col-form-label">Tanggal :</label>
            <div class="col-sm-10">
                <input type="datetime-local" class="form-control" id="date_time_late" name="date_time_late" value="{{ $latest->date_time_late }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="information" class="col-sm-2 col-form-label">Keterangan Keterlambatan :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="information" name="information" value=" {{ $latest->information }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="bukti" class="col-sm-2 col-form-label">Bukti :</label>
            <div class="col-sm-10">
                <input type="file" class="form-control"  name="bukti">
            </div>
        </div>

    <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
</form>
@endsection
