<!-- Font Awesome -->
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?php echo $base_url?>">SIRS</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="#">ST</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
 
      <li class="nav-item">
        <a href="index.php" class="nav-link"><i class="fas fa-hospital-user"></i><span>Daftar Pasiens</span></a>
      </li>
      <li class="nav-item">
        <a href="ajax_crud.php" class="nav-link"><i class="fas fa-house-medical"></i><span>Daftar Rumah Sakit</span></a>
      </li>
      <li class="nav-item">
        <a href="openapi.php" class="nav-link"><i class="fas fa-earth-asia"></i><span>Covid Indonesia</span></a>
      </li>
    </ul>
  </aside>
</div>