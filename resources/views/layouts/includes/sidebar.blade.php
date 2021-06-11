<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <center>
                <img src="{{ asset("storage/$setting->logo") }}" alt="Logo Sekolah">
                <a href="{{ url('/') }}">{{ $setting->name }}</a>
            </center>
        </div>
        {{-- <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">
                <i class="fad fa-home"></i>
            </a>
        </div> --}}
        <ul class="sidebar-menu">
            <li class="{{ active('dashboard') }}">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fad fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="menu-header">Data Master</li>

            <li class="{{ active('room') }}">
                <a class="nav-link" href="{{ route('master.room.index') }}">
                    <i class="fad fa-building"></i>
                    <span>Kelas</span>
                </a>
            </li>

            <li class="{{ active('school-year') }}">
                <a class="nav-link" href="{{ route('master.school-year.index') }}">
                    <i class="fad fa-flag"></i>
                    <span>Tahun Ajaran</span>
                </a>
            </li>

            <li class="{{ active('student*') }}">
                <a class="nav-link" href="{{ route('master.student.index') }}">
                    <i class="fad fa-users"></i>
                    <span>Siswa</span>
                </a>
            </li>

            <li class="{{ active('bill*') }}">
                <a class="nav-link" href="{{ route('master.bill.index') }}">
                    <i class="fad fa-balance-scale"></i>
                    <span>Tagihan</span>
                </a>
            </li>

            <li class="{{ active('document') }}">
                <a class="nav-link" href="{{ route('document.index') }}">
                    <i class="fad fa-file-alt"></i>
                    <span>Dokumen</span>
                </a>
            </li>

            <li class="menu-header">Keuangan</li>

            <li class="{{ active('spending*') }}">
                <a class="nav-link" href="{{ route('spending.index') }}">
                    <i class="fad fa-money-bill-alt"></i>
                    <span>Pengeluaran</span>
                </a>
            </li>

            <li class="{{ active('payment*') }}">
                <a class="nav-link" href="{{ route('payment.index') }}">
                    <i class="fad fa-money-bill-alt"></i>
                    <span>Pembayaran</span>
                </a>
            </li>

            {{-- <li class="menu-header">Website</li>

            <li class="#">
                <a class="nav-link" href="#">
                    <i class="fad fa-fire"></i>
                    <span>Blog</span>
                </a>
            </li>
            <li class="#">
                <a class="nav-link" href="#">
                    <i class="fad fa-fire"></i>
                    <span>Event</span>
                </a>
            </li>
            <li class="#">
                <a class="nav-link" href="#">
                    <i class="fad fa-fire"></i>
                    <span>Siswa Baru</span>
                </a>
            </li> --}}

            <li class="menu-header">Ekstra</li>

            <li class="{{ active('report*') }}">
                <a class="nav-link" href="{{ route('report.index') }}">
                    <i class="fad fa-chart-pie"></i>
                    <span>Laporan</span>
                </a>
            </li>

            <li class="{{ active('setting*') }}">
                <a class="nav-link" href="{{ route('setting.index') }}">
                    <i class="fad fa-cog"></i>
                    <span>Pengaturan</span>
                </a>
            </li>
        </ul>
        <div class="p-3 mt-4 mb-4 hide-sidebar-mini">
            <a href="#" class="btn btn-primary btn-lg btn-block">
                <div>Dokumentasi</div>
            </a>
        </div>
    </aside>
</div>
