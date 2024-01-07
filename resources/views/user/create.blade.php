@extends('layouts.template')

@section('content')
    <h4 class="display" style="color: black;">
        Data User
    </h4>
    <p style="color: black;">Dashboard / Data User / Tambah Data User</p>
    <form action="{{ route('user.store') }}" method="POST" class="card p-5">
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
            <label for="email" class="col-sm-2 col-form-label">Email : </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="role" class="col-sm-2 col-form-label">Tipe Pengguna : </label>
            <div class="col-sm-10">
                <select class="form-select" name="role" id="role">
                    <option selected disable hidden>Pilih</option>
                    <option value="admin">admin</option>
                    <option value="ps">pembimbing rayon</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
@endsection