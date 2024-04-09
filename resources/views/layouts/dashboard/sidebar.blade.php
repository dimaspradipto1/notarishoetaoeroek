  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar  text-success">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link text-success" href="{{ route('admin') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="fa-solid fa-folder-tree"></i><span>Data Berkas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('sertifikat.index') }}"  style="text-decoration: none">
              <i class="bi bi-circle"></i><span>Sertifikat</span>
            </a>
          </li>
          <li>
            <a href="{{ route('balik_nama_sertifikat.index') }}"  style="text-decoration: none">
              <i class="bi bi-circle"></i><span>Balik Nama Sertifikat</span>
            </a>
          </li>
          <li>
            <a href="{{ route('pbb.index') }}"  style="text-decoration: none">
              <i class="bi bi-circle"></i><span>PBB</span>
            </a>
          </li>
          <li>
            <a href="{{ route('izin_usaha.index') }}"  style="text-decoration: none">
              <i class="bi bi-circle"></i><span>Pengurusan Izin Usaha</span>
            </a>
          </li>
          <li>
            <a href="{{ route('tanah.index') }}"  style="text-decoration: none">
              <i class="bi bi-circle"></i><span>Jual Beli Tanah dan Bangunan</span>
            </a>
          </li>
        </ul>
      </li><!-- End Berkas Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="fa-solid fa-map-location-dot"></i></i><span>Data Lacak berkas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>

        {{-- @if (auth()->user()->roles == 'ADMIN')
        @endif --}}
          <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>  
              <a href="{{ route('lacak-sertifikat.index') }}">
                <i class="bi bi-circle"></i><span>Lacak Sertifikat</span>
              </a>
            </li>
          </ul>
        
          <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>  
              <a href="{{ route('lacak-balik-nama-sertifikat.index') }}">
                <i class="bi bi-circle"></i><span>Lacak Balik Nama Sertifikat</span>
              </a>
            </li>
          </ul>
     
          <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>  
              <a href="{{ route('lacak-pbb.index') }}">
                <i class="bi bi-circle"></i><span>Lacak PBB</span>
              </a>
            </li>
          </ul>

          <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>  
              <a href="{{ route('lacak-izin-usaha.index') }}">
                <i class="bi bi-circle"></i><span>Lacak Izin Usaha</span>
              </a>
            </li>
          </ul>

          <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>  
              <a href="{{ route('lacak-tanah.index') }}">
                <i class="bi bi-circle"></i><span>Lacak Jual Beli Tanah dan Bangunan</span>
              </a>
            </li>
          </ul>
          
        {{-- <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>  
            <a href="{{ route('lacak-sertifikat.show', $lacakSertifikat) }}">
              <i class="bi bi-circle"></i><span>Lacak Sertifikat</span>
            </a>
          </li>
        </ul> --}}
      </li><!-- End Lacak Nav -->
      

      @if(auth()->user()->roles == 'ADMIN')
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="fa-solid fa-users"></i><span>Pengguna</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
          <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="{{ route('users.index') }}">
                <i class="bi bi-circle"></i><span>Users</span>
              </a>
            </li>
          </ul>
        
        @endif
        
      </li><!-- End Pengguna Nav -->

    </ul>

  </aside><!-- End Sidebar-->