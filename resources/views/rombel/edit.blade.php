@extends('layouts.template')

@section('content')
    <h4 class="display" style="color: black;">
        Data Rombel
    </h4>
    <p style="color: black;">Dashboard / Data Rombel / Edit Data Rombel</p>
<form action="{{ route('rombel.update', $rombels['id']) }}" method="POST" class="card p-5">
    @csrf 
    @method('PATCH')

    @if(Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
        
    @endif
        <div class="mb-3">
            <label for="rombel" class="form-label">Rombel</label>
            <input type="text" name="rombel" class="form-control" value="{{ $rombels->rombel }}">
        </div>
    <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
  </form>

  @endsection