@extends('layouts.template')

@section('content')
<h4 class="display" style="color: black;">
    Data Keterlambatan
</h4>
<p style="color: black;">Dashboard / Data Keterlambatan / Detail Data Keterlambatan</p>
<h2 style="font-size: 25px;">{{ $lates[0]->student->name }} | {{ $lates[0]->student->rayon->rayon }} | {{ $lates[0]->student->rombel->rombel }} | </h2>
<br>
<div class="container">
  <div class="row">
    <div class="col-md-4">
      @php
      $no = 1;    
  @endphp
   @foreach ($lates as $item)
      <div class="card">
        <div class="card-body">
          <div class="container">
            <div class="row">
              <h5 class="card-title">Keterlambatan ke {{ $no++ }}</h5>
            </div>
            <div class="row">
              <p class="card-text">{{ date('d M Y H:i', strtotime($item['date_time_late'])) }}</p>
            </div>
            <div class="row">
              <a href="#" class="link">{{ $item->information }}</a>
            </div>
            <div class="row justify-content-center">
              <br><br>
          @if ($item['bukti'])
            <img style="width:190px;" class="" src="{{ asset('img/' . $item['bukti']) }}" alt="Bukti">
          @endif
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
{{-- <div class="row row-cols-md-3 g-3">
    @php
        $no = 1;    
    @endphp
    @foreach ($lates as $item)
    <div class="col-sm-6 mb-3 mb-sm-0">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Keterlambatan ke {{ $no++ }}</h5>
          <p class="card-text">{{ date('d M Y H:i', strtotime($item['date_time_late'])) }}</p>
          <a href="#" class="link">{{ $item->information }}</a>
          <br><br>
          @if ($item['bukti'])
            <img style="width:190px;" class="" src="{{ asset('img/' . $item['bukti']) }}" alt="Bukti">
          @endif
        </div>
      </div>
    </div>
    @endforeach
  </div> --}}
@endsection