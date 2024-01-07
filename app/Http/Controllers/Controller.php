<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Late;
use App\Models\Student;
use App\Models\Rayon;
use App\Models\Rombel;
use App\Models\User;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index(){
        $students = Student::all();
        $rombels = Rombel::all();
        $rayons = Rayon::all();
        $ps = User::where('role', 'ps')->get();
        $admin = User::where('role', 'admin')->get();

        return view('home', compact('students', 'rombels', 'rayons', 'ps', 'admin'));
    }
}
