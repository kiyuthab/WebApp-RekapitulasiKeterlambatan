<?php

namespace App\Exports;

use App\Models\Late;
use App\Models\Rayon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Support\Facades\DB;

class LateExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        if (Auth::user()->role == 'admin') {
            return Late::with('student')
                ->select('student_id', DB::raw('count(*) as total'))
                ->groupBy('student_id')
                ->get();
        } elseif (Auth::user()->role == 'ps') {
            $rayon = Rayon::where('user_id', Auth::user()->id)->first();
            return Late::with('student')
                ->select('student_id', DB::raw('count(*) as total'))
                ->groupBy('student_id')
                ->where('student_id', $rayon->id)
                ->get();
        }

        return collect(); 
    }

    public function headings(): array
    {
        return [
            "Nis", "Nama", "Rombel", "Rayon", "Total Keterlambatan"
        ];
    }

    public function map($late): array
    {
        $student = $late->student;

        return [
            $student->nis,
            $student->name,
            $student->rombel->rombel,
            $student->rayon->rayon,
            $late->total,
        ];
    }
}
