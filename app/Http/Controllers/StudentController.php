<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Rayon;
use App\Models\Late;
use App\Models\Rombel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{

    public function index()
    {
        $rayon = Rayon::all();
        $student = Student::all();
        $rombel = Rombel::all();
        return view('admin.student.index', compact('student', 'rayon', 'rombel'));
    }

    public function indexPs()
    {
        $rayon = Rayon::where('user_id', Auth::user()->id)->first();
        $student = Student::where('rayon_id', $rayon->id)->get();
        $rombel = Rombel::all();
        return view('pembimbing.student.home', compact('student', 'rayon', 'rombel'));
    }

    public function create()
    {

        $rayon = Rayon::all();
        $rombel = Rombel::all();

        return view('admin.student.create', compact('rayon', 'rombel'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'rayon_id' => 'required',
            'rombel_id' => 'required',
        ]);

        Student::create($validateData);
        return redirect()->back()->with('success', 'Berhasil menambahkan data Siswa !');
    }

    public function edit(string $id)
    {
        $student = Student::with('rayon', 'rombel')->find($id);
        $rombels = Rombel::all();
        $rayons = Rayon::all();
        return view('admin.student.edit', compact('student', 'rombels', 'rayons'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'rayon_id' => 'required',
            'rombel_id' => 'required',
        ]);

        Student::where('id', $id)->update($validatedData);

        return redirect()->route('student.home')->with('success', 'Berhasil mengubah data!');
    }

    public function destroy(string $id)
    {
        $deleted = Late::where('student_id', $id)->get();
        if ($deleted) {
            foreach ($deleted as $item) {
                $item->delete();
            }
        }
        Student::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }
}
