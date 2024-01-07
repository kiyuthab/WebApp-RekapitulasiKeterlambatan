@extends('layouts.template')

@section('content')
<style>
    a{
        text-decoration: none;
    }
</style>
<div class="title" style="margin: 4px 15px; ">
    <h3>Data Siswa</h3>
    <a href="/home">Dashboard / </a><a> Data Siswa  </a>
</div><br>

<div class="card px-3 shadow p-2">
    <div class="p-2">
        <table class="table datatable" id="tabless">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Name</th>
                    <th>Rombel</th>
                    <th>Rayon</th>
                </tr>
            </thead>

            <tbody>
                @php $no = 1; @endphp
                @foreach ($student as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item['nis'] }}</td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item->rombel->rombel }}</td>
                        <td>{{ $item->rayon->rayon }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@push('script')
    <script>new DataTable('#tabless')</script>
@endpush