<?php
namespace App\Http\Controllers;

use App\Models\Students; // Perbaikan: Mengimpor model Students
use App\Models\Rombels;
use App\Models\Rayons;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $siswaByRayon = null; // Inisialisasi variabel

        if (Auth::check() && Auth::user()->role === 'ps') {
            $rayon = Auth::user()->rayon;

            // Ambil data siswa berdasarkan rayon pengguna yang login
            $siswaByRayon = Students::where('rayon_id', $rayon)->get();
        }

        $countStudents = Students::count();
        $countRombels = Rombels::count();
        $countRayons = Rayons::count();
        $countAdmin = User::where('role', 'admin')->count();
        $countPs = User::where('role', 'ps')->count();

        return view('home.index', compact('countStudents', 'countRombels', 'countRayons', 'countAdmin', 'countPs', 'siswaByRayon')); // Kirim data siswaByRayon ke view
    }
}
