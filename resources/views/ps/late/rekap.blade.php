@extends('layouts.template')

@section('content')
<h4 class="display" style="color: black;">
    Data Keterlambatan
</h4>
<p style="color: black;">Dashboard / Data Keterlambatan</p>
<div class="container" style="background: #fff; padding: 20px; border-radius: 10px;">
    <table class="table table-striped table-bordered">
            <a class="btn btn-primary me-2" href="{{ route('late.create') }}">Tambah</a>
            <a class="btn btn-info text-white" href="#">Export Data Keterlambatan</a>
            <br><br>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="{{ route('ps.late.home') }}">Keseluruhan Data</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="{{ route('ps.late.rekap') }}">Rekapitulasi Data</a>
                </li>
            </ul>
            <br>
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Jumlah Keterlambatan</th>
                    <th>Detail</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($rekap as $item)
                        <tr class="text-center">
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->['student']['nis'] }}</td>
                            <td>{{ $item->['student']['name'] }}</td>
                            <td>{{ $item->['total'] }}</td>
                            <td class="justify-content-center">
                                <a href="{{ route('ps.late.detail', ['id' => $item->student_id) }}" class="btn btn-primary me-3">Detail</a>
                            </td>
                            <td>
                                @if ($item->late_count >= 3)
                                    <a href="{{ route('ps.late.print', ['id' => $item->student_id]) }}" class="btn btn-primary me-3">Cetak Surat Pernyataan</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </div>
    </table>
@endsection