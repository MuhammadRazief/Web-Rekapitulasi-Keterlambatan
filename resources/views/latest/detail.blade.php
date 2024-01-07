@extends('layouts.template')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <div class="card-title">
        <h5>Data Keterlambatan</h5>
        <p>Home / Data Keterlambatan / Detail Keterlambatan</p>    
    </div>
    <form action="" method="POST" class="card p-5" enctype="multipart/form-data">
    <div class="row row-cols-1 row-cols-md-2 g-3">
        @if ($students[$latest->name]['jumlah'] > 0)
            @for ($i = 0; $i < $students[$latest->name]['jumlah']; $i++)
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Keterlambatan {{ $i + 1 }}</h5>
                            <div class="card-text">
                                <p>Nama: {{ $latest->name }}</p>
                                <p>Tanggal: {{ $students[$latest->name]['keterlambatan'][$i]['date_time_late'] }}</p>
                                <p>Informasi: {{ $students[$latest->name]['keterlambatan'][$i]['information'] }}</p>
                                <p>bukti: {{ $students[$latest->name]['keterlambatan'][$i]['bukti'] }}</p>
                                
                            </div>
                            <!-- Tampilkan gambar dari database -->
                            

                        </div>
                    </div>
                </form>
                </div>
            @endfor
        @endif
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const input = document.querySelector('input[type="file"]');
        input.addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.querySelectorAll('.preview-image');
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    for (let i = 0; i < preview.length; i++) {
                        preview[i].style.display = 'block';
                        preview[i].src = e.target.result;
                    }
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>
