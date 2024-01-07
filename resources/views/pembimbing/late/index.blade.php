@extends('layouts.template')

@section('content')
  <style>
    a{
        text-decoration: none;
    }
  </style>
  <div class="title" style="margin: 4px 15px; ">
    <h3>Data Keterlambatan</h3>
    <a href="/home">Dashboard / </a><a> Data Keterlambatan </a>
  </div><br>

  <div class="card px-3 shadow p-2">
    <div class="card-body">
        @if(Session::get('success')) 
        <div class="alert alert-success"> {{Session::get('success')}}</div>
        @endif
        @if(Session::get('deleted')) 
        <div class="alert alert-warning"> {{Session::get('deleted')}}</div>
        @endif

      <a class="btn btn-info text-white" href="{{ route('ps.late.export-excel')}}">Export Data Keterlambatan</a>

      <ul class="nav nav-tabs mt-3">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('ps.late.home') }}">Keseluruhan Data</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('ps.late.rekap')}}">Rekapitulasi Data</a>
        </li>

      </ul>  

      <div class="p-2">
        <table class="table datatable" id="tables">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Tanggal</th>
                  <th>Informasi</th>
                </tr>
              </thead>
              <tbody>
                @php 
                  $no = 1; 
                @endphp
                @foreach ($late as $item)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>
                      <li class="list-group-item border-0 p-0">{{ $item['student']['nis'] }}</li>
                      <li class="list-group-item border-0 p-0">{{ $item['student']['name'] }}</li>
                    </td>
                    <td>{{ $item['date_time_late'] }}</td>
                    <td>{{ $item['information'] }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
      </div>
  </div>
@endsection

@push('script')
    <script>new DataTable('#tables')</script>
@endpush