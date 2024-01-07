@extends('layouts.template')

@section('content')
<div class="card-title">
    <h5>Tambah Data Keterlambatan</h5>
    <p>Home / Data Rayon / Tambah Data Keterlambatan</p>    
</div>
<div class="container border py-4 rounded">
    <form action="{{ route('latest.store') }}" method="POST" class="card p-5" enctype="multipart/form-data">
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
        <form method="POST" class="card p-5" enctype="multipart/form-data">
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Siswa :</label>
            <div class="col-sm-10">
                <select class="form-control" name="name" id="name">
                    <option selected disabled hidden>Pilih Siswa</option>
                    @foreach($students as $student)
                        <option value="{{ $student->nis }} - {{ $student->name }}">{{ $student->nis}} - {{ $student->name }} </option>
                    @endforeach
                </select>      
            </div>
        </div>
        
        <div class="mb-3 row">
            <label for="date_time_late" class="col-sm-2 col-form-label">Tanggal :</label>
            <div class="col-sm-10">
                <input type="datetime-local" class="form-control" id="date_time_late" name="date_time_late">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="information" class="col-sm-2 col-form-label">Keterangan Keterlambatan :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="information" name="information">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="bukti" class="col-sm-2 col-form-label">Bukti :</label>
            <div class="col-sm-10">
                <input type="file" class="form-control"  name="bukti">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Tambah Data</button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var now = new Date();
    var year = now.getFullYear();
    var month = (now.getMonth() + 1).toString().padStart(2, '0');
    var day = now.getDate().toString().padStart(2, '0');
    var hours = now.getHours().toString().padStart(2, '0');
    var minutes = now.getMinutes().toString().padStart(2, '0');

    var currentDateAndTime = `${year}-${month}-${day}T${hours}:${minutes}`;
    document.getElementById('date_time_late').value = currentDateAndTime;
});
</script>

@endsection
