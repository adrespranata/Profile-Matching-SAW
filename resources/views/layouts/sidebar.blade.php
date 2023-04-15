<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fa-solid fa-database"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SPK</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    @if (Auth::check())
    @if (Auth::user()->role_id == '1')
    <!-- Tampilkan menu untuk admin -->

    <!-- Heading -->
    <div class="sidebar-heading">
        Data
    </div>
    <!-- Nav Item - Siswa -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('siswa.index') }}">
            <i class="fa-solid fa-user-graduate"></i>
            <span>Siswa</span>
        </a>
    </li>
    <!-- Nav Item - Nilai -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('nilai.index') }}">
            <i class="fa-solid fa-table"></i>
            <span>Nilai</span>
        </a>
    </li>

    <!-- Nav Item - Bobot -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('bobot.index') }}">
            <i class="fa-solid fa-scale-balanced"></i>
            <span>Bobot Nilai</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data Perhitungan
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <i class="fa-solid fa-layer-group"></i>
            <span>Profile Matching</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('pmkriteria.index') }}">Kriteria</a>
                <a class="collapse-item" href="{{ route('pmsubkriteria.index') }}">Sub Kriteria</a>
                <a class="collapse-item" href="{{ route('pmbobotgap.index') }}">Bobot GAP</a>
                <a class="collapse-item" href="{{ route('pmhasil.index') }}">Hasil Perhitungan</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#CollapseTwo" aria-expanded="true" aria-controls="CollapseTwo">
            <i class="fa-solid fa-layer-group"></i>
            <span>SAW</span>
        </a>
        <div id="CollapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('sawkriteria.index') }}">Kriteria</a>
                <a class="collapse-item" href="{{ route('sawsubkriteria.index') }}">Sub Kriteria</a>
                <a class="collapse-item" href="{{ route('sawhasil.index') }}">Hasil Perhitungan</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Pengaturan
    </div>

    <!-- Nav Item - Pengguna -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.index') }}">
            <i class="fa-solid fa-users"></i>
            <span>Pengguna</span></a>
    </li>

    @else
    <!-- Tampilkan menu untuk user -->
    <!-- Heading -->
    <div class="sidebar-heading">
        Data
    </div>
    <!-- Nav Item - Siswa -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('siswa.index') }}">
            <i class="fa-solid fa-user-graduate"></i>
            <span>Siswa</span>
        </a>
    </li>
    <!-- Nav Item - Nilai -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('nilai.index') }}">
            <i class="fa-solid fa-table"></i>
            <span>Nilai</span>
        </a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data Perhitungan
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <i class="fa-solid fa-layer-group"></i>
            <span>Profile Matching</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('pmhasil.index') }}">Hasil Perhitungan</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#CollapseTwo" aria-expanded="true" aria-controls="CollapseTwo">
            <i class="fa-solid fa-layer-group"></i>
            <span>SAW</span>
        </a>
        <div id="CollapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('sawhasil.index') }}">Hasil Perhitungan</a>
            </div>
        </div>
    </li>
    @endif
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
    @endif

</ul>

<!-- End of Sidebar -->