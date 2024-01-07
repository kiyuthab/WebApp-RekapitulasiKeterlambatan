@extends('layouts.template')

@section('content')
<h4 class="display" style="color: black;">
  Data Rombel
</h4>
<p style="color: black;">Dashboard / Data Rombel / Tambah Data Rombel</p>
<form action="{{route('rombel.store')}}" method="POST" class="card p-5">
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
      <label for="rombel" class="col-sm-2 col-form-label">Rombel :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="rombel" name="rombel">
      </div>
    </div>
    
    <button type="submit" class="btn btn-primary mt-3" name="submit">Simpan</button>
  </form>

  @endsection