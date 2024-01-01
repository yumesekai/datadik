<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-danger elevation-4" style="background: #EEEEEE;">
    <!-- Brand Logo -->
    <a href="" class="brand-link" style="background: #EEEEEE;">
        <img src="{{ asset('img/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-dark" style="font-family: verdana, sans-serif;">SP-DATADIK</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Kepsek')
                <li class="nav-item">
                    <a href="{{ route('admin.home') }}" class="nav-link" id="Dashboard">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                    @if (Auth::user()->role == 'Admin')
                    <li class="nav-item">
                        <a href="{{ route('import') }}" class="nav-link" id="import">
                            <i class="nav-icon fas fa-rotate"></i>
                            <p>Import Data Dapodik</p>
                        </a>
                    </li> 
                    <li class="nav-item">
                        <a href="{{ route('user.index') }}" class="nav-link" id="ManageUser">
                            <i class="nav-icon fas fa-users-gear"></i>
                            <p>Managemen User</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('DataEkstrakulikuler.index') }}" class="nav-link" id="Ekstrakulikuler">
                            <i class="nav-icon fas fa-volleyball-ball fa-spin"></i>
                            <p>Data Ekstrakulikuler</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('kelas.index') }}" class="nav-link" id="kelas">
                            <i class="nav-icon fa-solid fa-graduation-cap"></i>
                            <p>Data Kelas</p>
                        </a>
                    </li>
                    @else
                    @endif
                <li class="nav-item has-treeview" id="liDataSiswa">
                    <a href="#" class="nav-link" id="DataSiswa">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Data Siswa
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        <li class="nav-item one" >
                            <a  href="{{ route('pribadi.index') }}" class="nav-link" id="pribadi">
                                <i class="fas fa-person nav-icon"></i>
                                <p>Data Pribadi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('orangtua.index') }}" class="nav-link" id="orangtua">
                                <i class="fas fa-users-rectangle nav-icon"></i>
                                <p>Data Orangtua</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('smp.index') }}" class="nav-link" id="smp">
                                <i class="fas fa-school nav-icon"></i>
                                <p>Data SMP</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('priodik.index') }}" class="nav-link" id="priodik">
                                <i class="fas fa-calendar-check nav-icon"></i>
                                <p>Data Priodik</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('ekstrakulikuler.index') }}" class="nav-link" id="DataEkstra">
                                <i class="nav-icon fas fa-swimmer"></i>
                                <p>Data Ekstrakulikuler</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('home.export_data') }}" class="nav-link" id="ExportExcel">
                                <i class="fas fa-download nav-icon"></i>
                                <p>Download Excel</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview" id="liAjuanData">
                    <a href="#" class="nav-link" id="AjuanData">
                        <i class="nav-icon fas fa-user-pen"></i>
                        <p>
                            Pengajuan Data Siswa
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        <li class="nav-item">
                            <a href="{{ route('TemPribadi.index') }}" class="nav-link" id="TemPribadi">
                                <i class="fas fa-person nav-icon"></i>
                                <p>Data Pribadi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('TemOrangtua.index') }}" class="nav-link" id="TemOrangtua">
                                <i class="fas fa-users-rectangle nav-icon"></i>
                                <p>Data Orangtua</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('TemSmp.index') }}" class="nav-link" id="TemSmp">
                                <i class="fas fa-school nav-icon"></i>
                                <p>Data SMP</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('TemPriodik.index') }}" class="nav-link" id="TemPriodik">
                                <i class="fas fa-calendar-check nav-icon"></i>
                                <p>Data Priodik</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('home.export_TemData') }}" class="nav-link" id="TemExportExcel">
                                <i class="fas fa-download nav-icon"></i>
                                <p>Download Excel</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @elseif (Auth::user()->role == 'Siswa')
                <li class="nav-item has-treeview">
                    <a href="{{ route('siswa.home') }}" class="nav-link" id="Home">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                
                <li class="nav-item has-treeview" id="liDataSiswa">
                    <a href="#" class="nav-link" id="DataSiswa">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Data Siswa
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        <li class="nav-item">
                            <a href="{{ route('pribadi.siswa') }}" class="nav-link" id="PribadiSiswa">
                                <i class="fas fa-person nav-icon"></i>
                                <p>Data Pribadi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('orangtua.siswa') }}" class="nav-link" id="OrangtuaSiswa">
                                <i class="fas fa-users-rectangle nav-icon"></i>
                                <p>Data Orangtua</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('smp.siswa') }}" class="nav-link" id="SmpSiswa">
                                <i class="fas fa-school nav-icon"></i>
                                <p>Data SMP</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('priodik.siswa') }}" class="nav-link" id="PriodikSiswa">
                                <i class="fas fa-calendar-check nav-icon"></i>
                                <p>Data Priodik</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('ekstrakulikuler.indexSiswa') }}" class="nav-link" id="EkstraSiswa">
                        <i class="nav-icon fas fa-volleyball-ball fa-spin"></i>
                        <p>Ekstrakulikuler</p>
                    </a>
                </li>
                @elseif (Auth::user()->role == 'Guru')
                <li class="nav-item has-treeview">
                    <a href="{{ route('guru.home') }}" class="nav-link" id="HomeGuru">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item has-treeview" id="liDataGuru">
                    <a href="#" class="nav-link" id="DataGuru">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Data Siswa {{Auth::user()->kelas->nama_kelas}}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        <li class="nav-item">
                            <a href="{{ route('pribadi.guru') }}" class="nav-link" id="PribadiGuru">
                                <i class="fas fa-person nav-icon"></i>
                                <p>Data Pribadi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('orangtua.guru') }}" class="nav-link" id="OrangtuaGuru">
                                <i class="fas fa-users-rectangle nav-icon"></i>
                                <p>Data Orangtua</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('smp.guru') }}" class="nav-link" id="SmpGuru">
                                <i class="fas fa-school nav-icon"></i>
                                <p>Data SMP</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('priodik.guru') }}" class="nav-link" id="PriodikGuru">
                                <i class="fas fa-calendar-check nav-icon"></i>
                                <p>Data Priodik</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('ekstrakulikuler.guru') }}" class="nav-link" id="EkstraGuru">
                                <i class="nav-icon fas fa-swimmer"></i>
                                <p>Ekstrakulikuler</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('DataEkstrakulikuler.pembinaEkstra') }}" class="nav-link" id="PembinaEkstra">
                        <i class="nav-icon fas fa-volleyball-ball fa-spin"></i>
                        <p>Ekstra Binaan</p>
                    </a>
                </li>
                @else
                <li class="nav-item has-treeview">
                    <a href="{{ url('/') }}" class="nav-link" id="Home">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>