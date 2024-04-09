@extends('layouts.dashboard.template')

@include('layouts.dashboard.header')
@include('layouts.dashboard.sidebar')

@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Form Data PBB</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
        <li class="breadcrumb-item">Forms</li>
        <li class="breadcrumb-item active">EDIT DATA PBB</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-8">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Update Status PBB</h5>

            <!-- General Form Elements -->
            <form action="{{ route('pbb.update', $pbb->id) }}" method="POST">
              @csrf
              @method('PUT')

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Upadate Status</label>
                <div class="col-sm-10">
                  <select name="status" class="form-control select2">
                    <option value="{{ $pbb->status }}"> {{ $pbb->status }} </option>
                    <option disabled> -------------------- </option>
                    <option value="PENDING">PENDING</option>
                    <option value="APPROVED">APPROVED</option>
                    <option value="REJECTED">REJECTED</option>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label" class="text-uppercase">ketrangan</label>
                <div class="col-sm-10">
                  <textarea name="keterangan" class="form-control" id="alamat" cols="30" rows="3">{{ $pbb->keterangan }}</textarea>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-secondary">UBAH</button>
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
@endpush
