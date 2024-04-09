@extends('layouts.dashboard.template')

@include('layouts.dashboard.header')
@include('layouts.dashboard.sidebar')
@section('content')

<main id="main" class="main">
  @include('sweetalert::alert')
  <div class="pagetitle">
    <h1>DATA LACAK SERTIFIKAT</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">Data Lacak Sertifikat</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">DATA LACAK SERTIFIKAT</h5>

            @if(Auth::user()->roles == 'ADMIN')
              <a href="{{ route('lacak-sertifikat.create') }}" class="btn btn-secondary text-white my-3"> + Tambah</a>
            @endif
            
            <div style="overflow: auto;">
              {{ $dataTable->table([
                'class'=> 'table table-striped table-bordered',
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