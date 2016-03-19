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
        <i class="fa fa-user"></i>
        <span>Master Admin</span>
    </a>
</li>
<li class="sub-menu">
    <a href="javascript:;" >
        <i class="fa fa-check"></i>
        <span>Verifikasi</span>
    </a>
    <ul class="sub">
        <li><a  href="{{ URL::to('admin/atlit') }}"><i class="fa fa-users"></i>Belum Verifikasi</i></a></li>
        <li><a  href="{{ URL::to('admin/atlitok') }}"><i class="fa fa-users"></i>Sudah Verifikasi</i></a></li>
        <li><a  href="{{ URL::to('admin/schools') }}"><i class="fa fa-hospital-o"></i>Verifikasi Per Sekolah</i></a></li>
    </ul>
</li>
<li>
    <a href="{{ URL::to('admin/valid') }}">
        <i class="fa fa-user-md"></i>
        <span>Validasi</span>
    </a>
</li>
<li class="sub-menu">
    <a href="javascript:;" >
        <i class="fa fa-check"></i>
        <span>Skema</span>
    </a>
    <ul class="sub">
        <li><a  href="{{ URL::to('admin/skema') }}"><i class="fa fa-archive"></i>Kelola Skema</i></a></li>
        <li><a  href="{{ URL::to('admin/indexcetakskema') }}"><i class="fa fa-print"></i>Print Skema</i></a></li>
    </ul>
</li>
<li>
    <a href="{{ URL::to('admin/sponsors') }}">
        <i class="fa fa-ticket"></i>
        <span>Sponsor</span>
    </a>
</li>
<li>
    <a href="{{ URL::to('admin/documents') }}">
        <i class="fa fa-file"></i>
        <span>Dokumen</span>
    </a>
</li>
<li>
    <a href="{{ URL::to('admin/rekors') }}">
        <i class="fa fa-trophy"></i>
        <span>Rekor</span>
    </a>
</li>
<li>
    <a href="{{ URL::to('admin/settings') }}">
        <i class="fa fa-gears"></i>
        <span>Pengaturan</span>
    </a>
</li>
