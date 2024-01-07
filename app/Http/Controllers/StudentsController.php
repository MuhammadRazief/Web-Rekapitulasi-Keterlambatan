<?php

namespace App\Http\Controllers;

use App\Models\students;
use App\Models\rombels;
use App\Models\rayons;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = Students::all();
        $rombels = Rombels::all();
        $rayons = Rayons::all();
        return view('siswas.index', compact('student', 'rombels', 'rayons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rombels = rombels::all();
        $rayons = rayons::all();
        return view('siswas.create', compact('rombels', 'rayons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'rombel_id' => 'required',
            'rayon_id' => 'required',
        ]);

        Students::create([
            'nis' => $request->nis,
            'name' => $request->name,
            'rombel_id' => $request->rombel_id,
            'rayon_id' => $request->rayon_id,
        ]);
        return redirect()->route('siswas.index')->with('success', 'Berhasil menambahkan data siswa!');
    }

    /**
     * Display the specified resource.
     */
    public function show(students $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $student = Students::find($id);
        
        $rombels = rombels::all();
        $rayons = rayons::all();
        return view('siswas.create', compact('rombels', 'rayons'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'rayon_id' => 'required',
            'rombel_id' => 'required',
        ]);

        Students::where('id', $id)->update([ //berdasarkan kondisi id yang cocok dengan $id
            'nis' => $request->nis,
            'name' => $request->name,
            'rombel_id' => $request->rombel_id,
            'rayon_id' => $request->rayon_id,
        ]);

        return redirect()->route('siswas.index')->with('success', 'berhasil mengubah data!');
    }

    public function delete($id)
    {
        Students::where('id', $id)->delete();
        return redirect()->route('siswas.index')->with('deleted', 'berhasil menghapus data!');
    }
    public function showStudentsByRayon()
    {
        // Dapatkan ID pengguna yang login
        $user = Auth::id();

        // Dapatkan data rayon terkait dengan pengguna yang login
        $rayons = User::find($userId)->rayon_id;

        // Ambil data peserta didik berdasarkan rayon
        $students = Students::where('rayon_id', $rayonId)->get();

        return view('students.index', compact('students'));
    }
}
