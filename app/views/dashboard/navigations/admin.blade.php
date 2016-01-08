<li>
    <a href="{{ URL::to('dashboard') }}">
        <i class="fa fa-dashboard"></i>
        <span>Dashboard</span>
    </a>
</li>
<li>
    <a href="{{ URL::to('admin/positions') }}">
        <i class="fa fa-star"></i>
        <span>Master Jabatan</span>
    </a>
</li>
<li>
    <a href="{{ URL::to('admin/admins') }}">
        <i class="fa fa-user-md"></i>
        <span>Master Admin</span>
    </a>
</li>
<li class="sub-menu">
    <a href="javascript:;" >
        <i class="fa fa-users"></i>
        <span>Pengolahan Peserta</span>
    </a>
    <ul class="sub">
        <li><a  href="{{ URL::to('admin/schools') }}">Daftar Sekolah</a></li>
        <li><a  href="#">Data Valid</a></li>
        <li><a  href="#">Validasi</a></li>
    </ul>
</li>
<li>
    <a href="{{ URL::to('admin/settings') }}">
        <i class="fa fa-gears"></i>
        <span>Pengaturan</span>
    </a>
</li>
