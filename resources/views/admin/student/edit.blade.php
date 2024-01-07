@extends('layouts.template')

@section('content')
<style>
    a{
        text-decoration: none;
    }
</style>
<div class="title" style="margin: 4px 15px;">
    <h3>Edit Data Siswa</h3>
    <a href="/home">Dashboard / </a><a href="{{ route('student.home') }}">Data Siswa / </a><a >Edit Data Siswa</a>
</div><br>

    <form action="{{ route('student.update', $student['id']) }}" method="POST" class="card p-5">
        @csrf
        @method('PATCH')

        @if ($errors->any())
            <ul class="alert alert-danger p-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="mb-3 row">
            <label for="name" class="col-sm-4 ccol-form-label"> NIS </label> <br>
            <div class="col-sm-12 right">
                <input type="number" class="form-control" id="nis" name="nis" value="{{ $student['nis'] }}">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="name" class="col-sm-4 ccol-form-label"> Name </label> <br>
            <div class="col-sm-12 right">
                <input type="text" class="form-control" id="name" name="name" value="{{ $student['name'] }}">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="name" class="col-sm-4 ccol-form-label"> Rombel </label>
            <div class="col-sm-12">
                <select class="form-select" id="rombel_id" name="rombel_id" required>
                    <option selected disabled hidden>Open this select menu</option>
                    @foreach ($rombels as $item)  
                      <option value="{{ $item->id }}" {{ $item->id == $student['rombel_id'] ? 'selected' : '' }}>{{ $item->rombel }}</option>
                    @endforeach
                  </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="name" class="col-sm-4 ccol-form-label"> Rayon </label>
            <div class="col-sm-12">
                <select class="form-select" id="rayon_id" name="rayon_id" required>
                    @foreach ($rayons as $items)  
                      <option value="{{ $items->id }}" {{ $items->id == $student['rayon_id'] ? 'selected' : '' }}>{{ $items->rayon }}</option>
                    @endforeach
                  </select>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
        
    </form>
    @endsection