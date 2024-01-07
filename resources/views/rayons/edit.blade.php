@extends('layouts.template')

@section('content')
<div class="container border py-4 rounded">
    <form action="{{ route('rayons.update', $rayon['id']) }}" method="post" class="card p-5">
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
            <label for="name" class="col-sm-2 col-form-label">Rayon :</label>
            <div class="col-sm-10">
                <select class="form-select" name="rayon" id="rayon" required>
                    <option selected disabled hidden>Pilih</option>
                    <option {{ $rayon['rayon'] == 'Cisarua 1' ? 'selected' : '' }}>Cisarua 1</option>
                    <option {{ $rayon['rayon'] == 'Cisarua 2' ? 'selected' : '' }}>Cisarua 2</option>
                    <option {{ $rayon['rayon'] == 'Cisarua 3' ? 'selected' : '' }}>Cisarua 3</option>
                    <option {{ $rayon['rayon'] == 'Cisarua 4' ? 'selected' : '' }}>Cisarua 4</option>
                    <option {{ $rayon['rayon'] == 'Cisarua 5' ? 'selected' : '' }}>Cisarua 5</option>
                    <option {{ $rayon['rayon'] == 'Cisarua 6' ? 'selected' : '' }}>Cisarua 6</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">User_id :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="user_id" name="user_id" value="{{ $rayon['user_id'] }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
    </form>
</div>
@endsection
