@extends ('layouts.template')

@section ('content')
<h4 class="display" style="color: black;">
    Data Keterlambatan
</h4>
<p style="color: black;">Dashboard / Data Keterlambatan</p>
<form action="{{ route('late.store') }}" method="POST" class="card p-5">
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
        <label for="student" class="col-sm-2 col-form-label">Siswa : </label>
        <div class="col-sm-10">
            <select class="form-select" name="student_id" id="student_id">
                @foreach ($students as $item)
                <option selected disable hidden>Pilih</option>
                <option value="{{ $item->id}}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="date_time_late" class="col-sm-2 col-form-label">Tanggal : </label>
        <div class="col-sm-10">
            <input type="datetime-local" class="form-control" id="date_time_late" name="date_time_late">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="information" class="col-sm-2 col-form-label">Keterangan Keterlambatan : </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="information" name="information">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="bukti" class="col-sm-2 col-form-label">Bukti : </label>
        <div class="col-sm-10">
            <input type="file" class="form-control" name= "bukti" id="bukti">
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Tambah</button>
</form>

@endsection