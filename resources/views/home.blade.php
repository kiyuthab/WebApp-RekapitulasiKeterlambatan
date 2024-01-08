@extends('layouts.template')

@section('content')
@csrf
    @if (Session::get('cantLogin'))
    <div class="alert alert-danger">{{ Session::get('cantLogin') }}</div>
   @endif 
        <h4 class="display" style="color: black;">
            Dashboard
        </h4>
        <p style="color: black;">Dashboard /</p>
        <div class="row row-cols-1 row-cols-md-3 g-3">
            <div class="col">
              <div class="card h-100 w-100 mb-7 border-0 shadow">
                <div class="card-body">
                  <h5 class="card-title">Peserta Didik</h5>
                  <div class="d-flex justify-content-start align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="circle-background">
                      <path fill="#525ceb" fill-rule="evenodd" d="M8 7a4 4 0 1 1 8 0a4 4 0 0 1-8 0m0 6a5 5 0 0 0-5 5a3 3 0 0 0 3 3h12a3 3 0 0 0 3-3a5 5 0 0 0-5-5z" clip-rule="evenodd"/>
                    </svg>
                    <p class="card-text mx-3">{{ count($students) }}</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100 w-60 mb-1 border-0 shadow">
                <div class="card-body">
                  <h5 class="card-title">Administrator</h5>
                  <div class="d-flex justify-content-start align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="circle-background">
                      <path fill="#525ceb" fill-rule="evenodd" d="M8 7a4 4 0 1 1 8 0a4 4 0 0 1-8 0m0 6a5 5 0 0 0-5 5a3 3 0 0 0 3 3h12a3 3 0 0 0 3-3a5 5 0 0 0-5-5z" clip-rule="evenodd" class="circle-background"/>
                    </svg>
                    <p class="card-text mx-3">{{ count($admin) }}</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100 w-60 mb-1 border-0 shadow">
                <div class="card-body">
                  <h5 class="card-title">Pembimbing Siswa</h5>
                  <div class="d-flex justify-content-start align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="circle-background">
                      <path fill="#525ceb" fill-rule="evenodd" d="M8 7a4 4 0 1 1 8 0a4 4 0 0 1-8 0m0 6a5 5 0 0 0-5 5a3 3 0 0 0 3 3h12a3 3 0 0 0 3-3a5 5 0 0 0-5-5z" clip-rule="evenodd"/>
                    </svg>
                    <p class="card-text mx-3">{{ count($ps) }}</p>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <br>
        <div class="row row-cols-1 row-cols-md-2 g-2">
            <div class="col">
              <div class="card h-100 w-100 mb-9 border-0 shadow">
                <div class="card-body">
                  <h5 class="card-title">Rombel</h5>
                  <div class="d-flex justify-content-start align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="circle-background">
                      <path fill="#525ceb" d="M15 5a2 2 0 0 1 2 2v16l-7-3l-7 3V7a2 2 0 0 1 2-2zM9 1h10a2 2 0 0 1 2 2v16l-2-.87V3H7a2 2 0 0 1 2-2"/>
                    </svg>
                    <p class="card-text mx-3">{{ count($rombels) }}</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100 w-60 mb-1 border-0 shadow ">
                <div class="card-body">
                  <h5 class="card-title">Rayon</h5>
                  <div class="d-flex justify-content-start align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="circle-background">
                      <path fill="#525ceb" d="M15 5a2 2 0 0 1 2 2v16l-7-3l-7 3V7a2 2 0 0 1 2-2zM9 1h10a2 2 0 0 1 2 2v16l-2-.87V3H7a2 2 0 0 1 2-2"/>
                    </svg>
                    <p class="card-text mx-3">{{ count($rayons) }}</p>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .jumbroton.py-2.px-3 h4 p{
        color: black;
    }

    .jumlah {
      font-size: 40px;
      font-weight: 400;
      margin-left: 10px;
      margin-top: 8px;
      color: #0024AC;
    }

    .card{
      border: none;
    }

    .circle-background {
    background-color: #ccdae99f; /* Warna light blue, Anda dapat mengganti kode warna ini sesuai keinginan */
    border-radius: 50%;
    padding: 10px; /* Sesuaikan sesuai kebutuhan */
    width: 50px;
    height: 50px;
  }
</style>