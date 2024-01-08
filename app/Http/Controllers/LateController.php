<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Late;
use App\Models\Student;
use App\Models\Rombel;
use App\Models\Rayon;
use Illuminate\Http\Request;
use PDF;
use Excel;
use App\Exports\LateExport;
use Illuminate\Support\Facades\Auth;


class LateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lates = Late::with('student')->get();
        return view('late.index', compact('lates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        return view('late.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'date_time_late' => 'required',
            'information' => 'required',
            'bukti' => 'required',
        ]);

        Late::create([
            'student_id' => $request->student_id,
            'date_time_late' => $request->date_time_late,
            'information' => $request->information,
            'bukti' => $request->bukti,
        ]);

        return redirect()->route('late.home')->with('success', 'Berhasil menambahkan data Keterlambatan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $lates = Late::where('student_id', $id)->get();
        return view('late.detail', compact('lates'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Late $late, $id)
    {
        $lates =Late::findOrFail($id);
        $students = Student::all();
        return view('Late.edit', compact('lates','students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required',
            'date_time_late' => 'required',
            'information' => 'required',
            'bukti' => 'nullable|mimes:jpg,jpeg,png,gif|max:1024'
        ]);

        $dataToUpdate = [
            'student_id' => $request->student_id,
            'date_time_late' => $request->date_time_late,
            'information' => $request->information,
        ];

        if ($request->hasFile('bukti')) {
            $bukti_file = $request->file('bukti');
            $bukti_nama = $bukti_file->hashName();
            $bukti_file->move(public_path('img'), $bukti_nama);

            $dataToUpdate['bukti'] = $bukti_nama;
        }

        Late::where('id', $id)->update($dataToUpdate);
        return redirect()->route('late.home')->with('success','data berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Late $late, $id)
    {
        $lates = Late::where('id', $id)->delete();
        return redirect()->back()->with('delete', 'Berhasil menghapus data Keterlambatan!');
    }

    public function rekap()
    {
        $lates = Student::whereHas('Late')->withCount('Late')
        // ->select('student_id', DB::raw('count(*) as total'))
        // ->groupBy('student_id')
        ->get();

        // dd($lates);
        $lateStudents = $lates->groupBy('student_id')->count();
        $students = Student::with('Late')->select('id', 'name', 'nis')->distinct()->get();
        return view('late.rekap', compact('lates', 'lateStudents', 'students'));
    }

    public function review($id)
    {
        $lates = Late::findOrFail($id)->first();
        return view('late.print', compact('lates'));
    }

    public function downloadPDF($id){
        $lates = late::findOrFail($id)->withCount('student')->first();
        $pdf = PDF::loadView('late.download', compact('lates'));
        return $pdf->download('late_' . $lates->id . '.pdf');
    }

    // ... Other methods ...

    public function exportExcel()
    {
        // $lates = Student::whereHas('Late')->withCount('Late')->get();
        // $lateStudents = $lates->groupBy('student_id')->count();
        // $students = Student::with('Late')->select('id', 'name', 'nis')->distinct()->get();

        // $export = new LateExport($students, $lateStudents);

        // $file_name = 'data_keterlambatan' . '.xlsx';
        // return Excel::download($export, $file_name);
        $lates = Late::all();
        $students = Student::with('rombel', 'rayon','late')->select('id', 'name', 'nis' , 'rombel_id', 'rayon_id')->distinct()->get();
        $export = new LateExport($students);
        return Excel::download($export, 'rekap_keterlambatan.xlsx');
    }

    // PEMBIMBING SISWA

    public function indexPs(){
        $rayon = Rayon::where('user_id', Auth::user()->id)->first();
        $student = Student::where('rayon_id', $rayon->id)->get();
        $late = Late::whereIn('student_id', $student->pluck('id'))->get();
        $rombel = Rombel::all();
    
        return view('ps.late.index', compact('late', 'student', 'rayon', 'rombel'));
    }

    public function detailPs($id)
    {
        $student = Student::findOrFail($id);
        $lates = Late::with('student')->where('student_id', $id)->get();
        return view('ps.late.detail', compact('lates', 'student'));
    }   

    public function laterekapPs()
    {
        $rayon = Rayon::where('user_id', Auth::user()->id)->first();
        $student = Student::where('rayon_id', $rayon->id)->get();
        $late = Late::whereIn('student_id', $student->pluck('id'))->get();
        $rekap = Late::select('student_id', DB::raw('count(*) as total'))
            ->whereIn('student_id', $student->pluck('id'))
            ->groupBy('student_id')
            ->get();

        return view('ps.late.rekap', compact('rekap', 'late', 'rayon', 'student'));
    }

    public function printPs($id) 
    {
        $student = Student::findOrFail($id);
        $late = Late::with('student')->where('student_id', $id)->get();
        return view("ps.late.print", compact('late', 'student'));
    }

    public function downloadPDFps($id)
    {
        $late = Late::find($id)->toArray();
        view()->share('late',$late);

        $student = Student::where('id', $late['student_id'])->first()->toArray();
        view()->share('student',$student);

        $rayon = Rayon::where('id', $student['rayon_id'])->first()->toArray();
        view()->share('rayon',$rayon);
        
        $rombel = Rombel::where('id', $student['rombel_id'])->first()->toArray();
        view()->share('rombel',$rombel);

        $ps = User::where('id', $rayon['user_id'])->first()->toArray();
        view()->share('ps',$ps);

        $pdf = PDF::loadview('ps.late.download', $late);
        return $pdf->download('Surat_Pernyataan.pdf');
    }

    public function dataPs()
    {
        $late = Late::with('student')->simplePaginate(5);
        return view("ps.late.index", compact('late'));
    }

    public function exportexcelPs()
    {
        $rayon = Rayon::where('user_id', Auth::user()->id)->first();
        return Excel::download(new \App\Exports\LateExport, 'data_keterlambatan '.$rayon->rayon.'.xlsx');
    }
}
