@extends('layouts.template')

@section('content')
<style>
    a{
        text-decoration: none;
    }
</style>
<div class="title" style="margin: 4px 15px;">
    <h3>Tambah Data siswa</h3>
    <a href="/home">Dashboard / </a><a href="{{ route('student.home') }}">Data Siswa / </a><a >Tambah Data Siswa</a>
</div><br>

    <form action="{{route('student.store')}}" method="POST" class="card p-5">
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
            <label for="nis" class="col-sm-3 col-form-label">NIS</label>
            <div class="col-sm-12">
                <input type="number" class="form-control" name="nis" id="nis">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="name" class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" name="name" id="name">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="type" class="col-sm-3 col-form-label">Rombel</label>
            <div class="col-sm-12">
                <select class="form-select" name="rombel_id" id="rombel_id">
                    @foreach ($rombel as $item)
                    <option selected disabled hidden>Pilih</option>
                    <option value="{{$item->id}}">{{$item->rombel}}</option>
                    @endforeach                 
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="type" class="col-sm-3 col-form-label">Rayon</label>
            <div class="col-sm-12">
                <select class="form-select" name="rayon_id" id="rayon_id">
                    @foreach ($rayon as $itm)
                    <option selected disabled hidden>Pilih</option>
                    <option value="{{$itm->id}}">{{$itm->rayon}}</option>
                    @endforeach                 
                </select>
            </div>
        </div>

            <button type="submit" class="btn btn-primary mt-3">
                Simpan
            </button>
    </form>
    @endsection