@extends('layouts.template')

@section('content')
    <h4 class="display" style="color: black;">
        Data Rayon
    </h4>
    <p style="color: black;">Dashboard / Data Rayon / Edit Data Rayon</p>
    <form action="{{ route('rayon.update', $rayons['id']) }}" method="POST" class="card p-5">
        @csrf
        @method('PATCH')

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="mb-3 row">
            <label for="rayon" class="col-sm-2 col-form-label">Rayon : </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="rayon" name="rayon" value="{{ $rayons['rayon'] }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="role" class="col-sm-2 col-form-label">Pembimbing rayon : </label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="user_id" id="user_id">
                    <option selected>Pilih</option>
                    @foreach ($users as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
    </form>
@endsection