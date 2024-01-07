@extends('layouts.template')

@section('content')
    <style>
        a {
            text-decoration: none;
        }
    </style>
    <div class="title" style="margin: 4px 15px;">
        <h3>Edit Data Keterlambatan</h3>
        <a href="/home">Dashboard / </a><a href="{{ route('late.home') }}">Data Keterlambatan / </a><a>Edit Data
            Keterlambatan</a>
    </div><br>
    <form action="{{ route('late.update', $late['id']) }}" method="POST" class="card p-5" enctype="multipart/form-data">
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
            <label for="student_id" class="col-sm-4 col-form-label"> Siswa </label> <br>
            <div class="col-sm-12 right">
                <select class="form-select" id="student_id" name="student_id" required>
                    @foreach ($student as $item)
                        <option value="{{ $item->id }}" {{ $item->id == $late['student_id'] ? 'selected' : '' }}>
                            {{ $item->nis }} - {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="date_time_late" class="col-sm-4 col-form-label"> Tanggal </label> <br>
            <div class="col-sm-12 right">
                <input type="timestamp" class="form-control" id="date_time_late" name="date_time_late"
                    value="{{ $late['date_time_late'] }}">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="type" class="col-sm-3 col-form-label">Keterangan Keterlambatan</label>
            <div class="col-sm-12">
                <textarea name="information" id="information" cols="100" rows="5" value="">{{ $late['information'] }}</textarea>
            </div>
        </div>


        <div class="mb-3 row">
            <label for="type" class="col-sm-3 col-form-label">Bukti</label>
            <div class="col-sm-12">
                <input type="hidden" name="oldImage" value="{{ $late->bukti }}">
                @if ($late->bukti)
                    <img src="{{ asset('post_bukti/' . $late->bukti) }}"
                        class="img-preview img-fluid mb-3 col-sm-5  d-block">
                @else
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                @endif
                <input type="file" name="bukti" id="bukti"
                    class="form-control @error('bukti') is-invalid @enderror" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        <p class="text-danger"> must not be greater than 1024 kilobytes</p>
                    </div>
                @enderror
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>

    </form>

    <script>
        function previewImage() {
            const bukti = document.querySelector('#bukti');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(bukti.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
