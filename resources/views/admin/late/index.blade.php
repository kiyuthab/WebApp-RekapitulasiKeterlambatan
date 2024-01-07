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

      <a href="{{ route('late.create') }}" class="btn btn-primary"> Tambah</a>
      <a class="btn btn-info text-white" href="{{ route('late.export-excel')}}">Export Data Keterlambatan</a>

      <ul class="nav nav-tabs mt-3">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('late.home') }}">Keseluruhan Data</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('late.rekap')}}">Rekapitulasi Data</a>
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
                  <th></th>
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
                    <td>
                      <div class="buttons d-flex justify-content-center">
                        <a href="{{ route('late.edit', $item['id']) }}" class="btn btn-primary me-3">Edit</a>
                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$item['id']}}">
                              Hapus
                          </button>
                      </div>
                    </td>
                  </tr>

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
                              <form action="{{route('late.delete', $item['id'] )}}"  method="POST">
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