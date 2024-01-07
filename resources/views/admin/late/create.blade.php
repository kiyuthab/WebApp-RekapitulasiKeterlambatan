@extends('layouts.template')

@section('content')
<style>
    a{
        text-decoration: none;
    }
</style>
<div class="title"  style="margin: 4px 15px; ">
    <h3 style="color:;">Tambah Data Keterlambatan</h3>
    <a href="/home">Dashboard / </a><a href="{{ route('late.home') }}" class="link-offset-2 link-underline link-underline-opacity-0 text-blue"> Data Keterlambatan / </a><a class="link-offset-2 link-underline link-underline-opacity-0 text-black">Tambah Data Keterlambatan</a>
</div><br>

    <form action="{{route('late.store')}}" method="POST" class="card p-5 shadow p-2" enctype="multipart/form-data">
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
            <label for="student_id" class="col-sm-3 col-form-label">Siswa</label>
            <div class="col-sm-12">
                <select class="form-select" name="student_id" id="student_id">
                    @foreach ($student as $item)
                    <option selected disabled hidden>Pilih</option>
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach                 
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="date_time_late" class="col-sm-3 col-form-label">Tanggal</label>
            <div class="col-sm-12">
                <input type="datetime-local" class="form-control" name="date_time_late" id="date_time_late">
            </div>
        </div>
        
        <div class="mb-3 row">
            <label for="type" class="col-sm-3 col-form-label">Keterangan Keterlambatan</label>
            <div class="col-sm-12">
                <textarea name="information" id="information" cols="123" rows="5"></textarea>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="bukti" class="col-sm-3 col-form-label">Bukti</label>
            <div class="col-sm-12">
                <img class="img-preview img-fluid mb-3 col-sm-5"> <br>
                <input type="file" name="bukti" id="bukti" class="form-control @error('bukti') is-invalid @enderror"
                onchange="previewImage()">
                @error('image')
                <div class="invalid-feedback">
                    <p class="text-danger"> must not be greater than 1024 kilobytes</p>
                </div>
                @enderror
            </div>
        </div>

            <button type="submit" class="btn btn-primary mt-3">
                Simpan
            </button>
    </form>

    <script>

        function previewImage(){
            const bukti = document.querySelector('#bukti');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(bukti.files[0]);

            oFReader.onload = function(oFREvent){
                imgPreview.src = oFREvent.target.result;
            }
        }

    </script>
    @endsection