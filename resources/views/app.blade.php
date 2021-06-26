<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{asset('css/all.css')}}">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">FactureApp</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item {{ (request()->is('parametrage*')) ? 'menu-open' : '' }}">
              <a href="#" class="nav-link {{ (request()->is('parametrage*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                  Paramètrage
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/parametrage/client" class="nav-link {{ (request()->is('parametrage/client')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Client</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/parametrage/reglement" class="nav-link {{ (request()->is('parametrage/reglement')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Réglement</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/parametrage/prestation" class="nav-link {{ (request()->is('parametrage/prestation')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Prestation</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item {{ (request()->is('facturation*')) ? 'menu-open' : '' }}">
              <a href="#" class="nav-link {{ (request()->is('facturation*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                  Facturation
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/facturation/creer" class="nav-link {{ (request()->is('facturation/creer')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Creer une facture</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/facturation/factures" class="nav-link {{ (request()->is('facturation/factures')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Liste des factures</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/facturation/comptes" class="nav-link {{ (request()->is('facturation/comptes')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Extrait de comptes</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    @yield('content')
    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.1.0
      </div>
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <script src="{{asset('js/all.js')}}"></script>
  @yield('scripts')
  <script>
    $(document).ready(function() {
      //Initialize Select2 Elements
      $('.select2').select2()
      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
      //Date picker
      $('#reservationdate1').datetimepicker({
        format: 'YYYY-MM-DD'
      });
      $('#reservationdate2').datetimepicker({
        format: 'YYYY-MM-DD'
      });
    });
  </script>
</body>

</html>