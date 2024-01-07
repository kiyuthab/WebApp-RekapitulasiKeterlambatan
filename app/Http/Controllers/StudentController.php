<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Rombel;
use App\Models\Rayon;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('rombel', 'rayon')->get();
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rombels = Rombel::all();
        $rayons = Rayon::all();
        return view('student.create', compact('rombels', 'rayons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'nis' => 'required|numeric',
            'rombel_id' => 'required',
            'rayon_id' => 'required'
        ]);

        Student::create([
            'name' => $request->name,
            'nis' => $request->nis,
            'rombel_id' => $request->rombel_id,
            'rayon_id' => $request->rayon_id
        ]);

        return redirect()->route('student.home')->with('success', 'Berhasil menambahkan data Siswa!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $students = Student::find($id);
        $rombels = Rombel::all();
        $rayons = Rayon::all();
        return view('student.edit', compact('students', 'rombels', 'rayons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student, $id)
    {
        $request->validate = ([
            'name' =>'required',
            'nis' => 'required',
            'rombel_id' => 'required',
            'rayon_id' => 'required',
        ]);

        Student::where('id', $id)->update([
            'name' => $request->name,
            'nis' => $request->nis,
            'rombel_id' => $request->rombel_id,
            'rayon_id' => $request->rayon_id
        ]);

        return redirect()->route('student.home')->with('success', 'Berhasil mengubah data Siswa!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student, $id)
    {
        $students = Student::where('id', $id)->delete();
        return redirect()->back()->with('delete', 'Berhasil menghapus data Siswa!');
    }

    public function indexPs()
    {
        $rayon = Rayon::where('user_id', Auth::user()->id)->first();
        $student = Student::where('rayon_id', $rayon->id)->get();
        $rombel = Rombel::all();
        return view('ps.student.home', compact('student', 'rayon', 'rombel'));
    }
}
