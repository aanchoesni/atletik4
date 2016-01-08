<li>
    <a href="{{ URL::to('dashboard') }}">
        <i class="fa fa-dashboard"></i>
        <span>Dashboard</span>
    </a>
</li>
<li class="sub-menu">
    <a href="javascript:;" >
        <i class="fa fa-users"></i>
        <span>Pengolahan Peserta</span>
    </a>
    <ul class="sub">
        <li><a  href="{{ URL::to('panitia/schools') }}">Daftar Sekolah</a></li>
        <li><a  href="#">Data Valid</a></li>
        <li><a  href="#">Validasi</a></li>
    </ul>
</li>
