@if(Auth::user()->roles == 'admin')
<section class="sidebar">
  <!-- Sidebar Menu -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MENU UTAMA</li>
    <li class="{{ (request()->is('admin')) ? 'active' : '' }}"><a href="/admin"><i class="fa fa-home"></i>
        <span>Beranda</span></a></li>
    <li class="{{ (request()->is('admin/data/user*')) ? 'active' : '' }}"><a href="/admin/data/user"><i
          class="fa fa-users"></i> <span>Data User</span></a></li>
    <li class="{{ (request()->is('admin/data/pegawai*')) ? 'active' : '' }}"><a href="/admin/data/pegawai"><i
          class="fa fa-users"></i> <span>Data Pegawai</span></a></li>
    <li class="{{ (request()->is('admin/data/jadwal*')) ? 'active' : '' }}"><a href="/admin/data/jadwal">
    <i class="fa fa-calendar"></i> <span>Jadwal Kegiatan</span> </a></li>
    <li class="{{ (request()->is('admin/data/monitoring*')) ? 'active' : '' }}"><a href="/admin/data/monitoring"><i
          class="fa fa-users"></i> <span>Monitoring</span></a></li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-file"></i> <span>Laporan</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="/admin/data/laporan/pegawaipns" target="_blank"><i class="fa fa-circle-o"></i> Laporan Pegawai
            PNS</a>
        </li>

        <li><a href="/admin/data/laporan/pegawaitekon" target="_blank"><i class="fa fa-circle-o"></i> Laporan Pegawai
            TEKON</a>
        </li>
        <li><a href="/admin/data/laporan/okb" target="_blank"><i class="fa fa-circle-o"></i> Laporan OKB</a></li>
        <li><a href="/admin/data/laporan/spt" target="_blank"><i class="fa fa-circle-o"></i> Laporan SPT</a></li>
        <li><a href="/admin/data/laporan/monitoring" target="_blank"><i class="fa fa-circle-o"></i> Laporan
            Monitoring</a></li>
      </ul>
    </li>
    <li><a href="/logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
  </ul>

</section>
@endif
@if(Auth::user()->roles == 'pegawai')
<section class="sidebar">
  <!-- Sidebar Menu -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MENU UTAMA</li>
    <li class="{{ (request()->is('pegawai')) ? 'active' : '' }}"><a href="/admin"><i class="fa fa-home"></i>
        <span>Beranda</span></a></li>
     <li class="{{ (request()->is('pegawai/data/jadwal*')) ? 'active' : '' }}"><a href="/pegawai/data/jadwal"><i
          class="fa fa-calendar"></i> <span>Jadwal DOOR TO DOOR</span></a></li>
    <li class="{{ (request()->is('pegawai/data/spt*')) ? 'active' : '' }}"><a href="/pegawai/data/spt"><i
          class="fa fa-file"></i> <span>Arsip SuratTugas</span></a></li>
    <li class="{{ (request()->is('pegawai/data/okb*')) ? 'active' : '' }}"><a href="/pegawai/data/okb"><i
          class="fa fa-users"></i> <span>Input OKB</span></a></li>
    <li><a href="/logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
  </ul>
</section>
@endif
@if(Auth::user()->roles == 'pimpinan')
<section class="sidebar">
  <!-- Sidebar Menu -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MENU UTAMA</li>
    <li class="{{ (request()->is('pimpinan')) ? 'active' : '' }}"><a href="/pimpinan"><i class="fa fa-home"></i>
        <span>Beranda</span></a></li>
    <li class="{{ (request()->is('pimpinan/data/monitoring*')) ? 'active' : '' }}"><a href="/pimpinan/data/monitoring"><i
          class="fa fa-file"></i> <span>Monitoring</span></a></li>
     <li class="treeview">
      <a href="#">
        <i class="fa fa-file"></i> <span>Laporan</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="/admin/data/laporan/pegawaipns" target="_blank"><i class="fa fa-circle-o"></i> Laporan Pegawai
            PNS</a>
        </li>

        <li><a href="/admin/data/laporan/pegawaitekon" target="_blank"><i class="fa fa-circle-o"></i> Laporan Pegawai
            TEKON</a>
        </li>
        <li><a href="/admin/data/laporan/okb" target="_blank"><i class="fa fa-circle-o"></i> Laporan OKB</a></li>
        <li><a href="/admin/data/laporan/spt" target="_blank"><i class="fa fa-circle-o"></i> Laporan SPT</a></li>
        <li><a href="/admin/data/laporan/monitoring" target="_blank"><i class="fa fa-circle-o"></i> Laporan
            Monitoring</a></li>
      </ul>
    </li>
    <li><a href="/logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
  </ul>

</section>
@endif