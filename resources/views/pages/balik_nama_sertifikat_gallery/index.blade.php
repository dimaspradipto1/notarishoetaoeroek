@extends('layouts.dashboard.template')

@include('layouts.dashboard.header')
@include('layouts.dashboard.sidebar')
@section('content')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Berkas Balik Nama Sertifikat</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">Data Berkas Balik Nama Sertifikat</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">DATA BERKAS BALIK NAMA SERTIFIKAT</h5>
            <div style="overflow: auto;">
              {{ $dataTable->table([
                'class' => 'table table-striped table-bordered',
                'style' => 'width:100%'  
              ]) }}
            </div>

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

@push('custom_scripts')
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}

@endpush


@endsection