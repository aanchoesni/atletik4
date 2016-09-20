@if (Sentry::getUser()->hasPermission('admin'))
<li>
    <a href="{{ URL::to('dashboard') }}">
        <i class="fa fa-dashboard"></i>
        <span>Dashboard</span>
    </a>
</li>
<li class="sub-menu">
    <a href="javascript:;" >
        <i class="fa fa-lock"></i>
        <span>Master</span>
    </a>
    <ul class="sub">
        <li><a href="{{ URL::to('admin/positions') }}"><i class="fa fa-star"></i>Master Jabatan</i></a></li>
        <li><a href="{{ URL::to('admin/admins') }}"><i class="fa fa-user"></i>Master Admin</i></a></li>
    </ul>
</li>
<li>
    <a href="{{ URL::to('admin/daftarsekolah') }}">
        <i class="fa fa-building-o"></i>
        <span>Sekolah</span>
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
        <i class="fa fa-folder"></i>
        <span>Rekap</span>
    </a>
    <ul class="sub">
        <li><a href="{{ URL::to('admin/atlitallv') }}"><i class="fa fa-users"></i>Rekap Atlit</i></a></li>
        <li><a href="{{ URL::to('admin/sertifikatatlet') }}"><i class="fa fa-users"></i>Rekap Sertifikat Atlit</i></a></li>
        <li><a href="{{ URL::to('admin/rekappendamping') }}"><i class="fa fa-user"></i>Rekap Pendamping</i></a></li>
        <li><a href="{{ URL::to('admin/bukudokumentasi') }}"><i class="fa fa-book"></i>Buku Dokumentasi</i></a></li>
        <li><a href="{{ URL::to('admin/logbooks') }}"><i class="fa fa-book"></i>Log Book</i></a></li>
    </ul>
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
@endif
@if (Sentry::getUser()->hasPermission('panitia'))
<li>
    <a href="{{ URL::to('dashboard') }}">
        <i class="fa fa-dashboard"></i>
        <span>Dashboard</span>
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
<li>
    <a href="{{ URL::to('admin/atlitallv') }}">
        <i class="fa fa-users"></i>
        <span>Rekap Atlet</span>
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
@endif
