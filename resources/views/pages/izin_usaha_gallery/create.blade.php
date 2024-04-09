@extends('layouts.dashboard.template')

@include('layouts.dashboard.header')
@include('layouts.dashboard.sidebar')

@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Form Berkas Pengurusan Izin Usaha</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
        <li class="breadcrumb-item">Forms</li>
        <li class="breadcrumb-item active">TAMBAH DATA PENGURUSAN IZIN USAHA</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-8">

        @include('components.message')


        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Form Upload Berkas Pengurusan Izin Usaha</h5>
            <p class="text-bold">*upload semua berkas yang dibutuhkan</p>
            <ol class="">
              <li>Membawa Surat Pengantar RT dan Lurah.</li>
              <li>Membawa Fotocopy KTP.</li>
              <li>Membawa Fotocopy NPWP.</li>
              <li>Membawa Fotocopy PBB.</li>
              <li>Membawa Fotocopy KK (Kartu Keluarga).</li>
              <li>Surat kuasa ( jika diberi kuasa ).</li>
            </ol>

            <!-- General Form Elements -->
            
            <form action="{{ route('izin_usaha.izin_usaha_gallery.store', $izinusaha->id ) }}" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="row-col-10 mb-3">
                <input type="file" name="files[]" multiple accept="image/*" class="form-control">
              </div>

              <div class="row mb-3">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-secondary">SIMPAN BERKAS</button>
                </div>
                <label class="col-sm-2 col-form-label"></label>
              </div>

            </form><!-- End General Form Elements -->

          </div>
        </div>

      </div>

    </div>
  </section>

</main><!-- End #main -->
@endsection

@push('custom_scripts')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>

  CKEDITOR.replace( 'alamat' );
</script>
@endpush