@extends('layouts.template')

@section('content')
  <style>

  </style>
  <div class="title" style="margin: 4px 15px; ">
    <h3>Data Keterlambatan</h3>
    <a href="/home">Dashboard / </a><a> Data Keterlambatan </a>
  </div><br>

  <div class="card px-3 shadow p-2">
    <div class="card-body">
      <a class="btn btn-info text-white" href="{{ route('ps.late.export-excel')}}">Export Data Keterlambatan</a>

      <ul class="nav nav-tabs mt-3">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('ps.late.home') }}">Keseluruhan Data</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('ps.late.rekap')}}">Rekapitulasi Data</a>
        </li>
      </ul>  

    <div class="p-2">
      <table class="table datatable" id="tables" >
        <thead>
          <tr>
            <th>No</th>
            <th>Nis</th>
            <th>Nama</th>
            <th>Jumlah Keterlambatan</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @php $no = 1; @endphp
          @foreach ($rekap as $item)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $item['student']['nis'] }}</td>
              <td>{{ $item['student']['name'] }}</td>
              <td>{{ $item['total'] }}</td>
              <td><a href="{{ route('ps.late.detail', ['id' => $item->student_id]) }}" class="text-blue-500 hover:text-blue-700">Lihat</a></td>
              <td>
                @if ($item->total>= 3)
                  <a  class="btn btn-danger btn-sm text-white hover:bg-red-800 display-flex" href="{{ route('ps.late.print',  ['id' => $item->student_id] )}}">Surat Pernyataan</a>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    </div>
  </div>
@endsection

@push('script')
    <script>new DataTable('#tables')</script>
@endpush