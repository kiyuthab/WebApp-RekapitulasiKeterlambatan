@extends('layouts.template')

@section('content')
<style>
    a{
        text-decoration: none;
    }
</style>

<div class="title" style="margin: 4px 15px; ">
    <h3>Tambah Data User</h3>
    <a href="/home">Dashboard /</a><a href="{{ route('user.home') }}" class="link-offset-2 link-underline link-underline-opacity-0 text-black"> Data User / </a><a href="{{ route('user.store')}}" class="link-offset-2 link-underline link-underline-opacity-0 text-black">Tambah Data User</a>
</div><br>

    <form action="{{route('user.store')}}" method="POST" class="card p-5">
        @csrf

        @if(Session::get('success'))
            <div class="alert alert-success"> {{ Session::get('success') }}</div>
        @endif
        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label"><h6>Nama</h6> </label><br>
            <div class="col-sm-12">
                <input type="text" class="form-control" name="name" id="name">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label"><h6>Email</h6></label><br>
            <div class="col-sm-12">
                <input type="email" class="form-control" id="email" name="email">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="type" class="col-sm-2 col-form-label"><h6>Tipe Pengguna</h6></label><br>
            <div class="col-sm-12">
                <select class="form-select" name="role" id="role">
                    <option selected disabled hidden> Pilih </option>
                    <option value="ps">Pembimbing Siswa</option>
                    <option value="admin">Administrator</option>                 
                </select>
            </div>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-primary mt-3" >
                Simpan
            </button>
        </div>
            
    </form>
    @endsection