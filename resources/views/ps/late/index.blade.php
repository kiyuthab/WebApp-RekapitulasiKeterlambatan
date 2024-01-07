@extends('layouts.template')

@section('content')
<h4 class="display" style="color: black;">
    Data Keterlambatan
</h4>
<p style="color: black;">Dashboard / Data Keterlambatan</p>
@if(Session::get('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if(Session::get('deleted'))
    <div class="alert alert-danger">{{ Session::get('deleted') }}</div>
    @endif
    <div class="container" style="background: #fff; padding: 20px; border-radius: 10px;">

    <table class="table table-striped table-bordered">
            <a class="btn btn-info text-white" href="{{ route('ps.late.export-excel') }}">Export Data Keterlambatan</a>
            <br><br>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('ps.late.home') }}">Keseluruhan Data</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('ps.late.rekap') }}">Rekapitulasi Data</a>
                </li>
            </ul>
            <br>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Informasi</th>
                </tr>
            </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($late as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item['student']['name'] }}</td>
                        <td>{{ $item['information'] }}</td>
                        <td>{{ $item['date_time_late'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
    </table>
</div>
@endsection