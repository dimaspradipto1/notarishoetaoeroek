@extends('layouts.dashboard.template')

@include('layouts.dashboard.header')
@include('layouts.dashboard.sidebar')

@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Form Berkas Jual Beli Tanah dan Bangunan</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
        <li class="breadcrumb-item">Forms</li>
        <li class="breadcrumb-item active">TAMBAH DATA JUAL BELI TANAH DAN BANGUNAN</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-8">

        @include('components.message')


        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Form Upload Berkas Jual Beli Tanah dan Bangunan</h5>
            <p class="text-bold">*upload semua berkas yang dibutuhkan</p>
            <ol class="">
              <li>Sertifikat tanah asli</li>
              <li>Bukti pembayaran PBB 5 tahun terakhir beserta STTS (Surat Tanda Terima Setoran) Izin Mendirikan Bangunan (IMB) asli.</li>
              <li>Persyaratan Penjual, Foto KTP, foto KK.</li>
              <li>Persyaratan Pembeli, Foto KTP suami dan istri (Jika sudah berkeluarga) Foto KK.</li>
              <li>Surat Kuasa (jika diberi kuasa)</li>
            </ol>

            <!-- General Form Elements -->
            
            <form action="{{ route('tanah.tanah_gallery.store', $tanah->id ) }}" method="POST" enctype="multipart/form-data">
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