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
            <form action="{{ route('lacak-tanah.store') }}" method="POST">
              @csrf

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Nama Pemohon</label>
                <div class="col-sm-10">
                  <select name="tanahs_id" id="select2" class="form-control">
                    <option value="">-- Pilih --</option>
                    @foreach ($tanah as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_pemilik }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="users_id" class="col-sm-2 col-form-label">User</label>
                <div class="col-sm-10">
                  <select name="users_id" id="users_id" class="form-control">
                    <option value="">-- Select User --</option>
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-10">
                  <textarea name="keterangan" class="form-control"></textarea>
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


@endsection


@push('custom_scripts')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace( 'alamat' );
</script>
<script>
  CKEDITOR.replace( 'keterangan' );
</script>

<script>
  // For Select2 4.0
$("#select2").select2({
    theme: "bootstrap-5",
    containerCssClass: "select2--small",
    dropdownCssClass: "select2--small",
});
</script>
@endpush