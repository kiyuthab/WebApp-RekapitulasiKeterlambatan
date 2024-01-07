@extends ('layouts.template')

@section('content')
<style>
    a{
        text-decoration: none;
    }
</style>
<div class="title" style="margin: 4px 15px;">
    <h3>Tambah Data Rombel</h3>
    <a href="/home">Dashboard / </a><a href="{{ route('rombel.home') }}">Data Rombel / </a><a >Tambah Data Rombel</a>
</div><br>

<form action="{{route('rombel.store')}}" class="card p-5" method="POST">
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
        <label for="rombel" class="col-sm-3 col-form-label">Rombel</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" name="rombel" id="rombel">
        </div>
    </div>

        <button type="submit" class="btn btn-primary mt-3">
            Simpan
        </button>
</form>
@endsection