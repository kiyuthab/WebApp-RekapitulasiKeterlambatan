@extends('layouts.template')

@section('content')
<style>
    a{
        text-decoration: none;
    }
</style>
<div class="title" style="margin: 4px 15px;">
    <h3>Data Rayon</h3>
    <a href="/home">Dashboard / </a><a href="{{ route('rayon.home') }}">Data Rayon / </a><a >Tambah Data Rayon</a>
</div><br>

    <form action="{{route('rayon.store')}}" method="POST" class="card p-5">
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
            <label for="rayon" class="col-sm-3 col-form-label">Rayon</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" name="rayon" id="rayon">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="type" class="col-sm-3 col-form-label">Pembimbing Siswa</label>
            <div class="col-sm-12">
                <select class="form-select" name="user_id" id="user_id">
                    @foreach ($user as $item)
                    <option selected disabled hidden>Pilih</option>
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach                 
                </select>
            </div>
        </div>

            <button type="submit" class="btn btn-primary mt-3">
                Simpan
            </button>
    </form>
    @endsection