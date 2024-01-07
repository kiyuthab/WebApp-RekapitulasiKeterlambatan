@extends('layouts.template')

@section('content')
    <h4 class="display" style="color: black;">
        Data Siswa
    </h4>
    <p style="color: black;">Dashboard / Data Siswa / Edit Data Siswa</p>
    <form action="{{ route('student.update', $students['id']) }}" method="PATCH" class="card p-5">
        @csrf
        @method('PATCH')

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Nama : </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{ $students->name }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nis" class="col-sm-2 col-form-label">NIS : </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nis" name="nis" value="{{ $students->nis }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="rombel" class="col-sm-2 col-form-label">Rombel : </label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="user_id" id="user_id">
                    <option selected>Pilih</option>
                    @foreach ($rombels as $item)
                        <option value="{{ $item->id }}">{{ $item->rombel }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="rayon" class="col-sm-2 col-form-label">Rayon : </label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="user_id" id="user_id">
                    <option selected>Pilih</option>
                    @foreach ($rayons as $item)
                        <option value="{{ $item->id }}">{{ $item->rayon }}</option>
                    @endforeach
                </select>
            </div>
        </div>        
        <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
    </form>
@endsection