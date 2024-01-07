@extends('layouts.template')

@section('content')
<style>
    a{
        text-decoration: none;
    }
</style>
<div class="title" style="margin: 4px 15px;">
    <h3>Edit Data User</h3>
    <a href="/home">Dashboard / </a><a href="{{ route('user.home') }}">Data User / </a><a >Edit Data User</a>
</div><br>

    <form action="{{ route('user.update', $user['id']) }}" method="POST" class="card p-5">
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
            <label for="name" class="col-sm-4 ccol-form-label"> Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{ $user['name'] }}">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="name" class="col-sm-4 ccol-form-label"> Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" value="{{ $user['email'] }}">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="name" class="col-sm-4 ccol-form-label"> Tipe Pengguna</label>
            <div class="col-sm-10">
                <select class="form-select" id="role" name="role">
                    <option value="admin" {{ $user['role'] == 'admin' ? 'selected' : ''}}>Admin</option>
                    <option value="ps" {{ $user['role'] == 'ps' ? 'selected' : ''}}>Pembimbing Siswa</option>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="name" class="col-sm-4 ccol-form-label"> Ubah Password </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="password" name="password" >
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
        
    </form>
    @endsection