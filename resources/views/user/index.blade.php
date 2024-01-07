@extends('layouts.template')

@section('content')
<h4 class="display" style="color: black;">
    Data User
</h4>
<p style="color: black;">Dashboard / Data User</p>
<div class="container" style="background: #fff; padding: 20px; border-radius: 10px;">
    <table class="table table-striped table-bordered table-hover">

    <a class="btn btn-primary" href="{{ route('user.create') }}">Tambah</a>
    <br><br>
    @if(Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if(Session::get('deleted'))
        <div class="alert alert-warning">{{ Session::get('deleted') }}</div>
    @endif
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($users as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ ucwords($item['name']) }}</td>
                    <td>{{ $item['email'] }}</td>
                    <td>{{ ucwords($item['role']) }}</td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('user.edit', $item['id']) }}" class="btn btn-primary me-3">Edit</a>
                        <form action="{{ route('user.delete', $item['id']) }}" method="POST" onsubmit="return confirm('yakin hapus data?')">
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