@extends('layouts.template')

@section('content')
<h4 class="display" style="color: black;">
    Data Rombel
</h4>
<p style="color: black;">Dashboard / Data Rombel</p>
<div class="container" style="background: #fff; padding: 20px; border-radius: 10px;">
    <table class="table table-striped table-bordered table-hover">
    <a href="{{route('rombel.create')}}" class="btn btn-primary mb-3">Tambah</a>
    @if(Session::get('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if(Session::get('deleted'))
    <div class="alert alert-danger">{{ Session::get('deleted') }}</div>
    @endif
    <thead>
            <tr>
                <th>No</th>
                <th>Rombel</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($rombels as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item['rombel'] }}</td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('rombel.edit', $item['id']) }}" class="btn btn-primary me-3">Edit</a>
                        <form action="{{ route('rombel.delete', $item['id']) }}" method="POST" onsubmit="return confirm('yakin hapus data?')">
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
           