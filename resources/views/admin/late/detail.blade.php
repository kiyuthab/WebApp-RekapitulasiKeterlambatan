@extends('layouts.template')

@section('content')

@if (Session::get('AlreadyAccess'))
<div class="alert alert-danger">{{ Session::get('AlreadyAccess') }}</div>
@endif

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<style>
    .col{
        font-family: 'Rethink Sans', sans-serif;
        color: #272A39;
    }

    a{
        text-decoration: none;
    }

    .name{
        display: flex;
    }
    
    .name h6{
        margin: 8px;
    }

    .carrd{
        display: grid;
        grid-template-columns: repeat(3, 1fr); /* Create three equal columns */
        gap: 20px;
    }


</style>
  <div class="title" style="margin: 4px 15px; ">
    <h3>Detail Data Keterlambatan</h3>
    <a href="/home">Dashboard / </a><a href="{{ route('late.rekap') }}" > Data Keterlambatan / </a><a> Detail Data Keterlambatan</a>
  </div><br><br>

    <div class="name" style="margin: 4px 15px;" >
        <h3 style="color: #012970;"> {{$student['name']}}  </h3>
        <h6 style="color: #8b9ec1;">  | {{ $student['nis'] }} | {{ $student['rombel']['rombel'] }} | {{ $student['rayon']['rayon'] }} </h6> 
      </div>

    <div class="carrd">
        @php $no = 1; @endphp
        @foreach ($late as $item) 
            <div class="card m-2 shadow p-2 bg-body rounded row flex-col">
                <div class="card-body p-3">
                    <h5 class="card-title shadow-md" style="color: #012970; text-align:center;">Keterlambatan ke- {{ $no++ }}</h5> <br>
                    <div>
                        <p style="font-weight: 500;">
                            Waktu : {{$item['date_time_late']}} <br>
                            Keterangan : {{$item['information']}}
                        </p>
                        <img src="{{ url('/') }}/{{  $item->bukti }}"  class="img-preview img-fluid mb-3  col-sm-15  d-block ">
                    </div>
                </div>
            </div>
        @endforeach
        @endsection
    </div>