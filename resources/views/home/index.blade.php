     @extends('layouts.template')
     @section('content')
     <link rel="stylesheet" href="{{ asset('css/style.css') }}">
                    <!-- Table Element -->
                    <div class="card-title">
                         <h5>Dashboard</h5>
                         <p>Home / Dashboard</p>    
                    </div>
                    @if(Auth::check() && Auth::user()->role === 'admin')
                              <div class="row g-3 mb-3">
                                   <div class="col-md-3">
                                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                                        <div>
                                             <p class="fs-5">Peserta Didik</p>   
                                             <h3 class="fs-2">{{ $countStudents ?? 0 }}</h3>            
                                        </div>
                                   
                                        </div>
                                   </div>
                                   <div class="col-md-3">
                                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                                        <div>
                                             <p class="fs-5">Administrator</p>
                                             <h3 class="fs-2">{{ $countAdmin ?? 0 }}</h3>
                                        </div>
                                   
                                        </div>
                                   </div>

                                   <div class="col-md-3">
                                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                                        <div>
                                             <p class="fs-5">Pem Siswa</p>
                                             <h3 class="fs-2">{{ $countPs ?? 0 }}</h3>
                                        
                                        </div>
                                   
                                        </div>
                                   </div>

                                   <div class="col-md-3">
                                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                                        <div>
                                             <p class="fs-5">Rombel</p>  
                                             <h3 class="fs-2">{{ $countRombels ?? 0 }}</h3>
                                        
                                        </div>
                              
                                        </div>
                                   </div>

                                   <div class="col-md-3">
                                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                                        <div>
                                             <p class="fs-5">Rayon</p>
                                             <h3 class="fs-2">{{ $countRayons ?? 0 }}</h3>                                 
                                   </div>
                              </div>
                         </div>
                    </div>
                    </div>
                    @endif
                     @if(Auth::check() && Auth::user()->role === 'ps')
        <div class="row g-3 mb-3">
            <div class="col-md-5">
                <div class="p-5 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                        <p class="fs-5">Peserta Didik Rayon
                            @php
                                // Mapping username ke nama rayon yang sesuai
                                $username = Auth::user()->name;
                                $rayonName = ''; // Inisialisasi variabel rayonName
                                switch ($username) {
                                    case 'PSCISaARUA1':
                                        $rayonName = 'Cisarua 1';
                                        break;
                                    case 'psbandung2':
                                        $rayonName = 'Bandung 2';
                                        break;
                                    // Tambahkan kondisi lain jika diperlukan untuk username lainnya
                                    default:
                                        $rayonName = 'Belum ada nama rayon';
                                }
                                echo $rayonName; // Tampilkan nama rayon
                            @endphp
                        </p>
                        <!-- Tampilkan informasi lainnya -->
                        <!-- ... -->
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="p-5 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                        <p class="fs-5">Keterlambatan Hari Ini</p>
                        <!-- Tampilkan jumlah siswa terlambat hari ini -->
                        <p>Jumlah siswa terlambat hari ini: {{ $countLate ?? 0 }}</p>
                        <p>{{ date("d F Y") }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
                            
          <script src="{{ asset('js/script.js') }}"></script>

     @endsection