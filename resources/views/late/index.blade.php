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
            <a class="btn btn-primary me-2" href="{{ route('late.create') }}">Tambah</a>
            <a class="btn btn-info text-white" href="{{ route('late.export-excel') }}">Export Data Keterlambatan</a>
            <br><br>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('late.home') }}">Keseluruhan Data</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('late.rekap') }}">Rekapitulasi Data</a>
                </li>
            </ul>
            <br>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Informasi</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($lates as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item['student']['name'] }}</td>
                        <td>{{ $item['information'] }}</td>
                        <td>{{ $item['date_time_late'] }}</td>
                        <td class="d-flex justify-content-center">                            
                            <a href="{{ route('late.edit', $item['id']) }}" class="btn btn-primary me-3">Edit</a>
                            <form action="{{ route('late.delete', $item['id']) }}" method="POST" onsubmit="return confirm('yakin hapus data?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
    </table>
</div>
@endsection