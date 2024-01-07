@extends('layouts.template')

@section('content')
<style>
    a{
        text-decoration: none;
    }
</style>
<div class="title" style="margin: 4px 15px;">
    <h3>Edit Data Rayon</h3>
    <a href="/home">Dashboard / </a><a href="{{ route('rayon.home') }}">Data Rayon / </a><a >Edit Data Rayon</a>
</div><br>

    <form action="{{ route('rayon.update', $rayon['id']) }}" method="POST" class="card p-5">
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
            <label for="name" class="col-sm-4 ccol-form-label"> Rayon</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="rayon" name="rayon" value="{{ $rayon['rayon'] }}">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="name" class="col-sm-4 ccol-form-label"> Pembimbing Siswa</label>
            <div class="col-sm-12">
                <select class="form-select" id="user_id" name="user_id" required>
                    @foreach ($ps as $item)  
                      <option value="{{ $item->id }}" {{ $item->id == $rayon['user_id'] ? 'selected' : '' }}>{{ $item->name }}</option>
                    @endforeach
                  </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
        
    </form>
    @endsection