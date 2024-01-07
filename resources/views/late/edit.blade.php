@extends('layouts.template')

@section('content')
    <h4 class="display" style="color: black;">
        Data Keterlambatan
    </h4>
    <p style="color: black;">Dashboard / Data Keterlambatan / Edit Data Keterlambatan</p>
<form action="{{ route('late.update', $lates['id']) }}" method="POST" class="card p-5" enctype="multipart/form-data">
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
    <div class="mb-3 row">
        <label for="student" class="col-sm-2 col-form-label">Siswa : </label>
        <div class="col-sm-10">
            <select class="form-select" name="student_id" id="student_id">
                @foreach ($students as $item)
                <option value="{{ $item->id}}" {{ $item->id == $lates->student_id ? 'selected' : '' }}>{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="date_time_late" class="col-sm-2 col-form-label">Tanggal : </label>
        <div class="col-sm-10">
            <input type="datetime-local" class="form-control" id="date_time_late" name="date_time_late" value="{{ $lates['date_time_late'] }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="information" class="col-sm-2 col-form-label">Keterangan Keterlambatan : </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="information" value="{{ $lates['information'] }}" name="information">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="information" class="col-sm-2 col-form-label">Bukti</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" id="bukti" name="bukti">
            <br>
            @if ($lates['bukti'])
                <img style="width:190px;" src="{{ asset('img/' . $lates['bukti']) }}" alt="Bukti">
            @endif
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
  </form>

  @endsection