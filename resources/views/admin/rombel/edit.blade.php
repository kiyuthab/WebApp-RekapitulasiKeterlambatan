@extends('layouts.template')

@section('content')
<style>
    a{
        text-decoration: none;
    }
</style>
<div class="title" style="margin: 4px 15px;">
    <h3>Edit Data Rombel</h3>
    <a href="/home">Dashboard / </a><a href="{{ route('rombel.home') }}">Data Rombel / </a><a >Edit Data Rombel</a>
</div><br>

    <form action="{{ route('rombel.update', $rombel['id']) }}" method="POST" class="card p-5">
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
            <label for="name" class="col-sm-2 ccol-form-label"> Rombel</label>
            <div class="col-sm-12 ">
                <input type="text" class="form-control" id="rombel" name="rombel" value="{{ $rombel['rombel'] }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
        
    </form>
    @endsection