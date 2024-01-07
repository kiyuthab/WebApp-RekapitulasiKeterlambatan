<?php

namespace App\Http\Controllers;

use App\Models\Rayon;
use App\Models\Late;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class RayonController extends Controller
{

    public function index()
    {
        $rayon = Rayon::all();
        $user = User::all();
        return view('admin.rayon.index', compact('rayon', 'user'));
    }

    public function create()
    {
        $user = User::all();

        return view('admin.rayon.create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rayon' => 'required',
            'user_id' => 'required',
        ]);

        Rayon::create([
            'rayon' => $request->rayon,
            'user_id' => $request->user_id,
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan data Rayon!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $rayon = Rayon::find($id);
        $ps = User::where('role', 'ps')->get();
        return view('admin.rayon.edit', compact('rayon', 'ps'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'rayon' => 'required',
            'user_id' => 'required',
        ]);

        $DataBaru = [
            'rayon' => $request->rayon,
            'user_id' => $request->user_id,
        ];

        Rayon::where('id', $id)->update($DataBaru);

        return redirect()->route('rayon.home')->with('success', 'Berhasil mengubah data!');
    }

    public function destroy(string $id)
    {
        Rayon::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }

    public function dashboard()
    {
        $userRayon = Rayon::where('user_id', Auth::user()->id)->first();
        $rayonStudentCount = Student::where('rayon_id', $userRayon->id)->count();
        $today = Carbon::now()->toDateString();
        $todayLateCount = Late::whereDate('created_at', $today)
            ->whereIn('student_id', Student::where('rayon_id', $userRayon->id)->pluck('id'))
            ->count();

        return view('pembimbing.home', compact('rayonStudentCount', 'todayLateCount', 'userRayon'));
    }
}
