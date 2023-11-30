<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
    <div class="sidebar-brand-icon">
      <i class="fas fa-birthday-cake"></i>
    </div>
    <div class="sidebar-brand-text mx-3">TechnoCake Admin</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('dashboard') }}">
      <i class="fas fa-table"></i>
      <span>Dashboard</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('various') }}">
      <i class="fas fa-table"></i>
      <span>Notificaciones</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('producto') }}">
      <i class="fas fa-birthday-cake"></i>
      <span>Producto</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('Pedidos') }}">
      <i class="fas fa-box-open"></i>
      <span>Pedidos</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('inventory') }}">
      <i class="fas fa-warehouse"></i>
      <span>Inventario</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('users') }}">
      <i class="fas fa-users"></i>
      <span>Usuarios</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="/profile">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Perfil</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>