<?php

namespace App\Http\Controllers;

use App\Models\lates;
use App\Models\students;
use Illuminate\Http\Request;
use PDF;

class LatesController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $latest = Lates::all();
        $student = Students::all();
        return view('latest.index', compact('latest', 'student'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $latest = Lates::all();
        $students = Students::all();
        return view('latest.create', compact('latest', 'students'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    
    $request->validate([
        'name' => 'required',
        'date_time_late' => 'required',
        'information' => 'required', 
        'bukti' => 'required', 
    ]);

    Lates::create([
        'name' => $request->name,
        'date_time_late' => $request->date_time_late,
        'information' => $request->information, 
        'bukti' => $request->bukti, 
    ]);
    $data = $request->all();
    $data['bukti'] = $request->file('image');  // Simpan file ke direktori yang tepat


    return redirect()->route('latest.index')->with('success', 'Berhasil menambahkan data lates!');

}

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $latest = Lates::find($id);
    $students = [];

    if ($latest) {
        $keterlambatanSiswa = Lates::where('name', $latest->name)->get();
        
        $students[$latest->name]['jumlah'] = $keterlambatanSiswa->count();
        $students[$latest->name]['keterlambatan'] = $keterlambatanSiswa->toArray();
    }

    return view('latest.detail  ', compact('latest', 'students'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $latest = Lates::find($id);
        return view('latest.edit', compact('latest'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function detail($id)
{
    $latest = Lates::find($id);
    // Lakukan pengelompokkan data keterlambatan untuk setiap siswa
    $students = [];

    if ($latest) {
        // Lakukan pengelompokkan
        $keterlambatanSiswa = Lates::where('name', $latest->name)->get();
        
        $students[$latest->name]['jumlah'] = $keterlambatanSiswa->count();
        $students[$latest->name]['keterlambatan'] = $keterlambatanSiswa->toArray();
    }

    // Sampaikan data ke view
    return view('latest.detail', compact('latest', 'students'));
}

    public function destroy($id)
    {
        Lates::where('id', $id)->delete();
        return redirect()->route('latest.index')->with('deleted', 'berhasil menghapus data!');
    }
    public function pdf($id)
    {
        $latest = Lates::find($id);
        $pdf = PDF::loadView('pdf', compact('latest')); // Gunakan view yang sesuai dengan informasi yang diperlukan
    
        return $pdf->download('late-'.$id.'.pdf');
    }
}
