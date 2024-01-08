<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Rayon;
use App\Models\User;
use App\Models\Late;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RayonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rayons = Rayon::with('user')->get();
        return view('rayon.index', compact('rayons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('rayon.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rayon' => 'required',
            'user_id' => 'required'
        ]);

        Rayon::create([
            'rayon' => $request->rayon,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('rayon.home')->with('success', 'Berhasil menambahkan data Rayon!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rayon $rayon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $users = User::all();
        $rayons = Rayon::find($id);
        return view('rayon.edit', compact('rayons', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate = [
            'rayon' => 'required',
            'user_id' => 'required'
        ];

        Rayon::where('id', $id)->update([
            'rayon' => $request->rayon,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('rayon.home')->with('success', 'Berhasil mengubah data Rayon!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rayon $rayon, $id)
    {
        Rayon::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Berhasil menghapus data Rayon!');
    }

    // PEMBIMBING SISWA 
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
