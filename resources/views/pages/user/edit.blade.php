@extends('layouts.dashboard.template')

@include('layouts.dashboard.header')
@include('layouts.dashboard.sidebar')

@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Form Status User</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
        <li class="breadcrumb-item">Forms</li>
        <li class="breadcrumb-item active">EDIT DATA STATUS USERS</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-8">

        {{-- @include('components.message') --}}


        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Update Status Users</h5>

            <!-- General Form Elements -->
            <form action="{{ route('users.update', $users->id) }}" method="POST">
              @csrf
              @method('PUT')

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                  <select name="status" class="form-control select2">
                    <option value="{{ $users->roles }}"> {{ $users->roles }} </option>
                    <option disabled> -------------------- </option>
                    <option value="USER">USER</option>
                    <option value="ADMIN">ADMIN</option>
                  </select>
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
