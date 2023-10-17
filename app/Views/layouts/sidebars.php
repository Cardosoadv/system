<?php $uri = new \CodeIgniter\HTTP\URI();?>
<?php $uri = current_url(true);?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="<?= lang('App.search') ?>">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge"><?=$num?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          
            <!-- Message Start -->
  <?php if($mrnl):?> 
  <?php foreach ($mrnl as $item):?>
    <a href="<?=$item['id']?>" class="dropdown-item">
    <div class="media">
    <img src="<?= base_url('home/exibir/users/'.$item['img'])?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">    
        <div class="media-body">
    <h3 class="dropdown-item-title">               
  <?php echo $item['username']; ?> 
    </h3> 
    <p class="text-sm">
  <?php echo $item['assunto']; ?>    
    </p><p class="text-sm text-muted"><i class="far fa-clock mr-1"></i></p>
        </div></div>
 
    </a><div class="dropdown-divider"></div><a href="#" class="dropdown-item">
  <?php endforeach; ?>
  <?php endif;?>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>




      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->



  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=site_url()?>" class="brand-link">
      <img src="<?= base_url("dist/img/logo.png")?>" alt="Cardoso e Bruno" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text">Cardoso & Bruno<br>Sociedade de Advogados</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('home/exibir/users/'.$user_data[0]['img'])?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a><?= $username ?></a><br>
          <a href="<?= site_url('logout') ?>">Logout</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="<?= lang('App.search') ?>" aria-label="<?= lang('App.search') ?>">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-item">
            <a href="<?=site_url('dashboard')?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
              <?= lang('App.Dashboard.title') ?>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('/processo') ?>" class="nav-link <?php
            if ($uri->getSegment(3) == 'processo') {echo 'active';}?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                <?= lang('App.Processos.title') ?>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo site_url('clientes') ?>" class="nav-link <?php if ($uri->getSegment(3) == 'clientes') {echo 'active';}?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
              <?= lang('App.Clientes.title') ?>
              </p>
            </a>
          </li>
          
           <li class="nav-item">
            <a href="<?php echo site_url('contratos') ?>" class="nav-link <?php if ($uri->getSegment(3) == 'contratos') {echo 'active';}?>">
              <i class="nav-icon fas fa-file-contract"></i>
              <p>
              <?= lang('App.Contratos.title') ?>
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?php echo site_url('faturas') ?>" class="nav-link <?php if ($uri->getSegment(3) == 'faturas') {echo 'active';}?>">
              <i class="nav-icon fas fa-file-contract"></i>
              <p>
              <?= lang('App.Faturas.title') ?>
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?php echo site_url('despesas') ?>" class="nav-link <?php if ($uri->getSegment(3) == 'despesas') {echo 'active';}?>">
              <i class="nav-icon fas fa-file-contract"></i>
              <p>
                  <?= lang('App.Despesas.title') ?>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url("agenda")?>" class="nav-link <?php if ($uri->getSegment(3) == 'agenda') {echo 'active';}?>">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
              <?= lang('App.Calendar') ?>
                <span class="badge badge-info right"><?=$num_tarefas?></span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url("tarefas/kanban")?>" class="nav-link <?php if ($uri->getSegment(4) == 'kanban') {echo 'active';}?>">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                Kanban
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url("configuracao")?>" class="nav-link <?php if ($uri->getSegment(3) == 'configuracao') {echo 'active';}?>">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Configurações
              </p>
            </a>
          </li>


    
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-search"></i>
              <p>
              <?= lang('App.search') ?>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>

 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
