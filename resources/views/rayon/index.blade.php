@extends('layouts.template')

@section('content')
<h4 class="display" style="color: black;">
    Data Rayon
</h4>
<p style="color: black;">Dashboard / Data Rayon</p>
<div class="container" style="background: #fff; padding: 20px; border-radius: 10px;">
<table class="table table-striped table-bordered">
        <a class="btn btn-primary" href="{{ route('rayon.create') }}">Tambah</a>
        <br><br>
        <thead>
            <tr>
                <th>No</th>
                <th>Rayon</th>
                <th>Pembimbing Rayon</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($rayons as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item['rayon'] }}</td>
                    <td>{{ $item['user']['name'] }}</td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('rayon.edit', $item['id']) }}" class="btn btn-primary me-3">Edit</a>
                        <form action="{{ route('rayon.delete', $item['id']) }}" method="POST" onsubmit="return confirm('yakin hapus data?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </div>
</table>
@endsection