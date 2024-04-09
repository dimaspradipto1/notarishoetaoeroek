@extends('layouts.dashboard.template')

@include('layouts.dashboard.header')
@include('layouts.dashboard.sidebar')

@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Form Data Jual Beli Tanah dan Bangunan</h1>
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
            <h5 class="card-title">Tambah Form Input Jual Beli Tanah dan Bangunan</h5>

            <!-- General Form Elements -->
            <form action="{{ route('tanah.store') }}" method="POST">
              @csrf

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Nama Pemilik</label>
                <div class="col-sm-10">
                  <input type="text" name="nama_pemilik" value="{{ old('nama_pemilik') }}" class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Nik Pemilik</label>
                <div class="col-sm-10">
                  <input type="number" name="nik_pemilik" value="{{ old('nik_pemilik') }}" class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">No HP</label>
                <div class="col-sm-10">
                  <input type="number" name="no_hp" value="{{ old('no_hp') }}" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Nama Pemberi Kuasa</label>
                <div class="col-sm-10">
                  <input type="text" name="nama_kuasa" value="{{ old('nama_kuasa') }}" class="form-control">

                </div>
              </div>

              <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Nik Pemberi Kuasa</label>
                <div class="col-sm-10">
                  <input type="number" name="nik_kuasa" value="{{ old('nik_kuasa') }}" class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">No HP Pemberi Kuasa</label>
                <div class="col-sm-10">
                  <input type="number" name="no_hp_kuasa" value="{{ old('no_hp_kuasa') }}" class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-secondary">SIMPAN</button>
                </div>
              </div>

            </form><!-- End General Form Elements -->

          </div>
        </div>

      </div>

    </div>
  </section>

</main><!-- End #main -->

@include('layouts.dashboard.footer')
@endsection

@push('custom_scripts')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>

  CKEDITOR.replace( 'alamat' );
</script>
@endpush