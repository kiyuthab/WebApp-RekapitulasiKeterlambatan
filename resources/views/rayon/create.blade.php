@extends('layouts.template')

@section('content')
    <h4 class="display" style="color: black;">
        Data Rayon
    </h4>
    <p style="color: black;">Dashboard / Data Rayon / Tambah Data Rayon</p>
<form action="{{ route('rayon.store') }}" method="POST" class="card p-5">
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
        <label for="name" class="col-sm-2 col-form-label">Rayon : </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="rayon" name="rayon">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="role" class="col-sm-2 col-form-label">Pembimbing rayon : </label>
        <div class="col-sm-10">
            <select class="form-select" name="user_id" id="user_id">
                @foreach ($users as $item)
                <option selected disable hidden>Pilih</option>
                <option value="{{ $item->id}}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
</form>
@endsection

