@extends('layouts.dashboard.template')

@include('layouts.dashboard.header')
@include('layouts.dashboard.sidebar')

@section('content')
@include('sweetalert::alert')


<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-8">
        <div class="row">

          <!-- Customers Card -->
          <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>data sertifikat</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Detail</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">SERTIFIKAT</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $sertifikat }}</h6>
                    <span class="text-danger small pt-1 fw-bold">file</span>
                  </div>
                </div>

              </div>
            </div>

          </div><!-- End Sertifikat Card -->
          
          <!-- Pemohon Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>data balik nama sertifikat</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Detail</a></li>
              </div>

              <div class="card-body">
                <h5 class="card-title text-uppercase">balik nama sertifikat</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-file-lines"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $balikNamaSertifikat }}</h6>
                    <span class="text-success small pt-1 fw-bold">file</span> 

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Pemohon Card -->

          <!-- pbb Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>data PBB</h6>
                  </li>

                  <li><a class="dropdown-item" href="{{ route('pbb.index') }}">Detail</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">PBB</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-file"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $pbb }}</h6>
                    <span class="text-success small pt-1 fw-bold">file</span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End pbb Card -->

          <!-- penguruasan izin usaha Card -->
          <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>data pengurusan izin usaha</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Detail</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title text-uppercase">pengurusan izin usaha</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $izinUsaha }}</h6>
                    <span class="text-danger small pt-1 fw-bold">file</span>

                  </div>
                </div>

              </div>
            </div>

          </div><!-- End penbgurusan izin usaha Card -->

          <!-- jual beli tanah dan bangunan Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>data jual beli tanah dan bangunan</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Detail</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title text-uppercase">jual beli tanah dan bangunan</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-file"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $tanah }}</h6>
                    <span class="text-success small pt-1 fw-bold">file</span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End jual beli tanah dan bangunan Card -->

          <!-- berkas -->
          <div class="col-12">
            <div class="card top-selling overflow-auto">

              <div class="card-body pb-0">
                <h5 class="card-title">Berkas</h5>

                <table class="table table-borderless">
                  <thead>
                    <tr>
                      <th scope="col">Berkas</th>
                      <th scope="col">Pengajuan</th>
                    </tr>
                  </thead>
                  <tbody>
                   
                    <tr>
                      <td><a href="#" class="text-primary fw-bold">Sertifikat</a></td>
                      <td>{{ $sertifikat }}</td>
                    </tr>
                    <tr>
                      <td><a href="#" class="text-primary fw-bold">Balik Nama Sertifikat</a></td>
                      <td>{{ $balikNamaSertifikat }}</td>
                    </tr>
                    <tr>
                      <td><a href="#" class="text-primary fw-bold">PBB</a></td>
                      <td>{{ $pbb }}</td>
                    </tr>
                    <tr>
                      <td><a href="#" class="text-primary fw-bold">pengurasan izin usaha</a></td>
                      <td>{{ $izinUsaha }}</td>
                    </tr>
                    <tr>
                      <td><a href="#" class="text-primary fw-bold">jual beli tanah dan bangunan</a></td>
                      <td>{{ $tanah }}</td>
                    </tr>
                  </tbody>
                </table>

              </div>

            </div>
          </div><!-- End berkas -->
          
          
          @if(auth()->user()->roles == 'ADMIN')
          
          <!-- report berkas pending -->
          <div class="col-12">
            <div class="card top-selling overflow-auto">
  
              <div class="card-body pb-0">
                <h5 class="card-title">Report Berkas Status <span
                  class="badge bg-warning text-white rounded-pill px-3 py-2"
                  >Pending</span></h5>
  
                <table class="table table-borderless">
                  <thead>
                    <tr>
                      <th scope="col">Berkas</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">Export</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><a href="#" class="text-primary fw-bold">Sertifikat</a></td>
                      <td>{{ $sertifikatStatusPending }}</td>
                      <td><a href="{{ route('export_sertifikat') }}" class="text-primary fw-bold text-decoration-none text-success"><i class="fa-sharp fa-solid fa-file-excel"></i> Excel</td>
                    </tr>
  
                    <tr>
                      <td><a href="#" class="text-primary fw-bold">Balik Nama Sertifikat</a></td>
                      <td>{{ $balikNamaSertifikatStatusPending }}</td>
                      <td><a href="{{ route('export_balik_nama_sertifikat') }}" class="text-primary fw-bold text-decoration-none text-success"><i class="fa-sharp fa-solid fa-file-excel"></i> Excel</td>
                    </tr>
                    <tr>
                      <td><a href="#" class="text-primary fw-bold">PBB</a></td>
                      <td>{{ $pbbStatusPending }}</td>
                      <td><a href="{{ route('export_pbb') }}" class="text-primary fw-bold text-decoration-none text-success"><i class="fa-sharp fa-solid fa-file-excel"></i> Excel</td>
                    </tr>
                    <tr>
                      <td><a href="#" class="text-primary fw-bold">pengurasan izin usaha</a></td>
                      <td>{{ $izinUsahaStatusPending }}</td>
                      <td><a href="{{ route('export_izin_usaha') }}" class="text-primary fw-bold text-decoration-none text-success"><i class="fa-sharp fa-solid fa-file-excel"></i> Excel</td>
                    </tr>
                    <tr>
                      <td><a href="#" class="text-primary fw-bold">jual beli tanah dan bangunan</a></td>
                      <td>{{ $tanahStatusPending }}</td>
                      <td><a href="#" class="text-primary fw-bold text-decoration-none text-success"><i class="fa-sharp fa-solid fa-file-excel"></i> Excel</td>
                    </tr>
                  </tbody>
                </table>
  
              </div>
  
            </div>
          </div><!-- End Report berkas pending -->

          <!-- report berkas rejected -->
          <div class="col-12">
            <div class="card top-selling overflow-auto">
  
              <div class="card-body pb-0">
                <h5 class="card-title">Report Berkas Status <span
                  class="badge bg-danger text-white rounded-pill px-3 py-2"
                  >Rejected</span></h5>
  
                <table class="table table-borderless">
                  <thead>
                    <tr>
                      <th scope="col">Berkas</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">Excel</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><a href="#" class="text-primary fw-bold">Sertifikat</a></td>
                      <td>{{ $sertifikatStatusRejected }}</td>
                    </tr>
  
                    <tr>
                      <td><a href="#" class="text-primary fw-bold">Balik Nama Sertifikat</a></td>
                      <td>{{ $balikNamaSertifikatStatusRejected }}</td>
                    </tr>

                    <tr>
                      <td><a href="#" class="text-primary fw-bold">PBB</a></td>
                      <td>{{ $pbbStatusRejected }}</td>
                    </tr>

                    <tr>
                      <td><a href="#" class="text-primary fw-bold">pengurasan izin usaha</a></td>
                      <td>{{ $izinUsahaStatusRejected }}</td>
                    </tr>
                    <tr>
                      <td><a href="#" class="text-primary fw-bold">jual beli tanah dan bangunan</a></td>
                      <td>{{ $tanahStatusRejected }}</td>
                    </tr>
                  </tbody>
                </table>
  
              </div>
  
            </div>
          </div><!-- End Report berkas rejected -->

          <!-- report berkas approved -->
          <div class="col-12">
            <div class="card top-selling overflow-auto">
  
              <div class="card-body pb-0">
                <h5 class="card-title">Report Berkas Status <span
                  class="badge bg-success text-white rounded-pill px-3 py-2"
                  >Approved</span></h5>
  
                <table class="table table-borderless">
                  <thead>
                    <tr>
                      <th scope="col">Berkas</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">Excel</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><a href="#" class="text-primary fw-bold">Sertifikat</a></td>
                      <td>{{ $sertifikatStatusSuccess }}</td>
                    </tr>
  
                    <tr>
                      <td><a href="#" class="text-primary fw-bold">Balik Nama Sertifikat</a></td>
                      <td>{{ $balikNamaSertifikatStatusSuccess }}</td>
                    </tr>

                    <tr>
                      <td><a href="#" class="text-primary fw-bold">PBB</a></td>
                      <td>{{ $pbbStatusSuccess }}</td>
                    </tr>

                    <tr>
                      <td><a href="#" class="text-primary fw-bold">pengurasan izin usaha</a></td>
                      <td>{{ $izinUsahaStatusSuccess }}</td>
                    </tr>
                    <tr>
                      <td><a href="#" class="text-primary fw-bold">jual beli tanah dan bangunan</a></td>
                      <td>{{ $tanahStatusSuccess }}</td>
                    </tr>
                  </tbody>
                </table>
  
              </div>
  
            </div>
          </div><!-- End Report berkas approved -->

          @endif
        </div>
      </div><!-- End Left side columns -->

      <!-- Right side columns -->
      <div class="col-lg-4">

        <!-- Recent Activity -->
        <div class="card">

          <div class="card-body">
            <h5 class="card-title">Lacak | <span>Data Berkas</span> </h5>

            <div class="activity">

              <div class="activity-item d-flex">
                <div class="activite-label"><i class="fa-solid fa-users-between-lines"></i></div>
                <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                <div class="activity-content">
                 <a href="#" class="fw-bold text-dark">sertifikat</a>
                </div>
              </div><!-- End activity item-->

              <div class="activity-item d-flex">
                <div class="activite-label"><i class="fa-solid fa-file-lines"></i></div>
                <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                <div class="activity-content">
                  <a href="#" class="fw-bold text-dark">balik nama sertifikat</a>
                </div>
              </div><!-- End activity item-->

              <div class="activity-item d-flex">
                <div class="activite-label"><i class="fa-solid fa-file-lines"></i></div>
                <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                <div class="activity-content">
                  <a href="#" class="fw-bold text-dark">PBB</a>
                </div>
              </div><!-- End activity item-->

              <div class="activity-item d-flex">
                <div class="activite-label"><i class="fa-solid fa-file-lines"></i></div>
                <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                <div class="activity-content">
                  <a href="#" class="fw-bold text-dark">pengurusan izin usha</a>
                </div>
              </div><!-- End activity item-->

              <div class="activity-item d-flex">
                <div class="activite-label"><i class="fa-solid fa-file-lines"></i></div>
                <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                <div class="activity-content">
                  <a href="#" class="fw-bold text-dark">jual beli tanah dan bangunan</a>
                </div>
              </div><!-- End activity item-->
            </div>

          </div>
        </div><!-- End Recent Activity -->

       

      </div><!-- End Right side columns -->

    </div>
  </section>

</main><!-- End #main -->

@include('layouts.dashboard.footer')
    
@endsection