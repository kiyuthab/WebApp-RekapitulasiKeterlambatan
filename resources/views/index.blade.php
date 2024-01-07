@extends('layouts.template')

@section('content')

@if (Session::get('AlreadyAccess'))
<div class="alert alert-danger">{{ Session::get('AlreadyAccess') }}</div>
@endif

<div class="jumbotron py-4 px-5">
    <h5 class="display-4"> 
        Selamat datang {{ Auth::user()->name }}!
    </h5>
    <hr class="my-4">
    <p>Aplikasi ini digunakan hanya oleh pegawai administrator dan pembimbing siswa 
       dalam mengelola keterlambatan siswa
    </p>
</div>
@endsection