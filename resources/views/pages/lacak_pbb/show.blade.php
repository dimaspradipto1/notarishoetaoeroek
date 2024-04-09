@extends('layouts.dashboard.template')

@include('layouts.dashboard.header')
@include('layouts.dashboard.sidebar')

@section('content')
@include('sweetalert::alert')


<main id="main" class="main">

  <div class="pagetitle">
    <h1>Lacak Berkas Sertifikat</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Lacka Berkas Sertifikat</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">


      <!-- Right side columns -->
      <div class="col-lg-8">

        <!-- Recent Activity -->
        <div class="card">

          <div class="card-body">
            <h5 class="card-title">Lacak | <span>Data Berkas</span> </h5>

            <div class="activity">
              @foreach ($lacakSertifikats as $lacakSertifikat)
              <div class="activity-item d-flex">
                <div class="activite-label mr-2">
                  <a href="#" class="fw-bold text-dark" style="text-decoration: none">
                    {{ $lacakSertifikat->created_at->format('d/m/Y') }}
                  </a>
                </div>
                <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>

                <div class="activity-content">
                  <h5 class="fw-bold text-dark" style="text-decoration: none">
                    {{ $lacakSertifikat->sertifikat->nama_pemilik }}
                  </h5>
                  <h6 class="fw-bold text-dark" style="text-decoration: none">
                    {!! $lacakSertifikat->keterangan !!}
                  </h6>
                </div>
              </div><!-- End activity item-->
              @endforeach

              {{-- @foreach ($lacakSertifikats as $lacakSertifikat)
              <div class="activity-item d-flex">
                <div class="activite-label mr-2">
                  <a href="#" class="fw-bold text-dark" style="text-decoration: none">
                    {{ $lacakSertifikat->created_at->format('d/m/Y') }}
                  </a>
                </div>
                <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>

                <div class="activity-content">
                  <h5 class="fw-bold text-dark" style="text-decoration: none">
                    {{ $lacakSertifikat->sertifikat->nama_pemilik }}
                  </h5>
                  <h6 class="fw-bold text-dark" style="text-decoration: none">
                    {!! $lacakSertifikat->keterangan !!}
                  </h6>
                </div>
              </div><!-- End activity item-->
              @endforeach --}}

            </div>
          </div><!-- End Recent Activity -->

        </div><!-- End Right side columns -->

      </div>
  </section>

</main><!-- End #main -->

{{-- @include('layouts.dashboard.footer') --}}

@endsection