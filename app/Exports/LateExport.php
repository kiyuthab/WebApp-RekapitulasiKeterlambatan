<?php

namespace App\Exports;

use App\Models\Late;
use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LateExport implements FromCollection, WithHeadings, WithMapping
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $this->students = Student::all(); 
        $this->lateStudents = Late::all()->groupBy('student_id')->map->count();

        return collect($this->students);
    }

    public function map($item): array
    {
        return [
            $item->id,
            $item->nis,
            $item->name,
            $item->rombel->rombel,
            $item->rayon->rayon,
            $this->lateStudents[$item->id] ?? 0,

        ];
    }

    public function headings(): array
    {
        return [
            "No",
            "NIS",
            "Nama",
            "Rombel",
            "Rayon",
            "Jumlah Keterlambatan",
        ];
    }
}
