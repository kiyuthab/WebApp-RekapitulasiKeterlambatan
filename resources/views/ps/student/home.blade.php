@extends('layouts.template')

@section('content')
<h4 class="display" style="color: black;">
    Data Siswa
</h4>
<p style="color: black;">Dashboard / Data Siswa</p>
<div class="container" style="background: #fff; padding: 20px; border-radius: 10px;">
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nis</th>
                <th>Rombel</th>
                <th>Rayon</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($student as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ ucwords($item['nis']) }}</td>
                    <td>{{ ucwords($item['name']) }}</td>
                    <td>{{ $item->rombel->rombel  }}</td>
                    <td>{{ $item->rayon->rayon }}</td>
                </tr>  
            @endforeach
        </tbody>
    </table>
</div>
@endsection