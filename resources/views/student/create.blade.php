@extends('layouts.template')

@section('content')
    <h4 class="display" style="color: black;">
        Data Siswa
    </h4>
    <p style="color: black;">Dashboard / Data Siswa / Tambah Data Siswa</p>

<form action="{{ route('student.store') }}" method="POST" class="card p-5">
    @csrf

    @if(Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Nama : </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="nis" class="col-sm-2 col-form-label">NIS : </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nis" name="nis">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="rombel_id" class="col-sm-2 col-form-label">Rombel : </label>
        <div class="col-sm-10">
            <select class="form-select" aria-label="Default select example" name="rombel_id">
                @foreach ($rombels as $item)
                <option selected disabled hidden>Pilih</option>
                <option value= "{{$item->id }}">{{$item->rombel}} </option>
                @endforeach
            </select>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="rayon_id" class="col-sm-2 col-form-label">Rayon : </label>
        <div class="col-sm-10">
            <select class="form-select" aria-label="Default select example" name="rayon_id">
                @foreach ($rayons as $item)
                <option selected disabled hidden>Pilih</option>
                <option value="{{ $item->id }}">{{$item->rayon}} </option>
                @endforeach
            </select>
        </div>
      </div>
    
    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
</form>
@endsection

