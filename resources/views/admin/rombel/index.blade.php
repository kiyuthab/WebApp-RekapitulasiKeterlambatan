@extends('layouts.template')

@section('content')
<style>
    a{
        text-decoration: none;
    }
</style>
<div class="title" style="margin: 4px 15px; ">
    <h3>Data Rombel</h3>
    <a href="/home">Dashboard / </a><a> Data Rombel  </a>
</div><br>

<div class="card px-3 shadow p-2 ">
    @if(Session::get('success')) 
    <div class="alert alert-success"> {{Session::get('success')}}</div>
    @endif
    @if(Session::get('deleted')) 
    <div class="alert alert-warning"> {{Session::get('deleted')}}</div>
    @endif

    <div class="container mt-3">
        <div class="d-flex">
            <a href="{{ route('rombel.create') }}" class="btn btn-primary"> Tambah</a>
        </div>
    </div> <br>

    <div class="p-2">
        <table class="table datatable" id="tables">
        <thead>
            <tr>
                <th>No</th>
                <th>Rombel</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @php $no = 1; @endphp
            @foreach ($rombel as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item['rombel'] }}</td>

                    <td class="d-flex justify-content-center">
                        <a href="{{route('rombel.edit', $item['id']) }}" class="btn btn-primary me-3">Edit</a>


                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$item['id']}}">
                                Hapus
                            </button>
                    </td>
                </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal-{{$item['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel ">Konfirmasi Hapus</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                
                                <div class="modal-body"><br>
                                    Yakin ingin menghapus data ini?
                                </div><br>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form action="{{route('rombel.delete', $item['id'] )}}"  method="POST">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                @endforeach
        </tbody>
    </table>
</div>

</div>
@endsection

@push('script')
    <script>new DataTable('#tables')</script>
@endpush