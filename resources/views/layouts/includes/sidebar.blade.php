<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ active('dashboard') }}">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fire"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="menu-header">Data Master</li>

            <li class="{{ active('room') }}">
                <a class="nav-link" href="{{ route('master.room.index') }}">
                    <i class="fas fa-fire"></i>
                    <span>Kelas</span>
                </a>
            </li>

            <li class="{{ active('school-year') }}">
                <a class="nav-link" href="{{ route('master.school-year.index') }}">
                    <i class="fas fa-fire"></i>
                    <span>Tahun Ajaran</span>
                </a>
            </li>

            <li class="{{ active('student*') }}">
                <a class="nav-link" href="{{ route('master.student.index') }}">
                    <i class="fas fa-fire"></i>
                    <span>Siswa</span>
                </a>
            </li>

            <li class="menu-header">Transaksi</li>

            <li class="{{ active('bill') }}">
                <a class="nav-link" href="{{ route('master.bill.index') }}">
                    <i class="fas fa-fire"></i>
                    <span>Tagihan</span>
                </a>
            </li>

            <li class="{{ active('payment') }}">
                <a class="nav-link" href="{{ route('payment.index') }}">
                    <i class="fas fa-fire"></i>
                    <span>Pembayaran</span>
                </a>
            </li>

            <li class="menu-header">Ekstra</li>

            <li class="">
                <a class="nav-link" href="#">
                    <i class="fas fa-fire"></i>
                    <span>Laporan</span>
                </a>
            </li>
            <li class="">
                <a class="nav-link" href="#">
                    <i class="fas fa-cog"></i>
                    <span>Pengaturan</span>
                </a>
            </li>
        </ul>
        <div class="p-3 mt-4 mb-4 hide-sidebar-mini">
            <a href="documentation.html" class="btn btn-primary btn-lg btn-icon-split btn-block">
                <i class="far fa-question-circle"></i>
                <div>Dokumentasi</div>
            </a>
        </div>
    </aside>
</div>
