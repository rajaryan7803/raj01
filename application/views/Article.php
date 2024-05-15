<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>My Web Application</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url();?>public/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url();?>public/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?= base_url();?>public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

  <link rel="stylesheet" href="<?=base_url();?>public/plugins/summernote/summernote-bs4.css">

 
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->

    <!-- SEARCH FORM -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
  
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="<?=base_url('Admin/Categiryview');?>">
          Welcome, <strong>Administrater</strong>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="<?=base_url('Admin/Login');?>" class="dropdown-item">
           Logout
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link bg-white">
      <img src="<?= base_url();?>public/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text"><strong>My Web Application</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Deshboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Categories
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('Admin/created')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('Admin/Categiryview');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Categories</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Articles
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('Admin/Art');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Article</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('Admin/Articlelist');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Article</p>
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
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url('Admin/Art');?>">Home</a></li>
              <li class="breadcrumb-item active"><a href="<?=base_url('Admin/Articlelist');?>">Articleview</li></a>
  
             
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">


            <div class="card">

              <div class="card-header">
                <div class="card-title">
                  <form action="#" id="searchFrm" name="searchFrm" method="post">
                    <div class="input-group mb-0">
                      <input type="text" value="" class="form-control" placeholder="Search" name="q">
                      <button type="button" class="btn btn-secondary" data-mdb-ripple-init>
                      <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </form>
                </div>
                <div class="card-tools">
                  <a href="<?=base_url('Admin/Created');?>" class="btn btn-primary">Create</a>
                </div>
              </div>
              <div class="card-body">
                <form action="<?php echo base_url('Admin/ArticleValidate');?>" method="post" enctype="multipart/form-data">
                   

                 <div class="form-group">
                    <label>Tittle</label><br>
                    <input type="text" name="title" id="title" value="">
                    <?php echo form_error('title', '<div class="error">', '</div>'); ?>
                </div>

                <!-- <div class="form-group">
                    <label>Description</label><br>
                    <input type="text" name="description" id="description" value="">
                    
                </div> -->




    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                My Codeigneter Web
                <small>Simple and fast</small>
              </h3>
              <!-- tools box -->
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fas fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
              <div class="mb-3">
                <textarea class="textarea"  type="description" name="description" id="title" value="" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>

                  <div class="form-group">
                    <label>Image</label><br>
                    <input type="file" name="file_name" id="file_name" value="" required>
                    <?php echo form_error('file_name', '<div class="error">', '</div>'); ?>
                    
        
                </div>


                <div class="form-group">
                    <label>Author</label><br>
                    <input type="text" name="author" id="author" value="" >
                    <?php echo form_error('author', '<div class="error">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label>Created</label><br>
                    <input type="text" name="created_at" id="created" value="">
                    <?php echo form_error('created_at', '<div class="error">', '</div>'); ?>
                </div>
                 

                <div class="custom-control custom-radio float-left">
                    <input class="custom-control-input" value="1" type="radio" id="statusActive" name="status" >
                    <label for="statusActive" class="custom-control-label">Active</label>
                    <?php echo form_error('status', '<div class="error">', '</div>'); ?>
                </div>


                <div class="custom-control custom-radio float-left ">
                    <input class="custom-control-input" value="0" type="radio" id="statusBlock" name="status">
                    <label for="statusBlock" class="custom-control-label">Block</label>
                    <?php echo form_error('status', '<div class="error">', '</div>'); ?>
                </div>
                </div>
      

                <div class="card-footer">
                <button class="btn btn-primary"  type="submit">Submit</button>
                <a href="<?=base_url('Admin/Articlelist');?>" class="btn btn-secondary">Back</a>
                </div>


              </form>
                <table class="table">
                  <tr>
                    <th width="50">#</th>
                    <th width="160">Title</th>
                    <th width="160">Author</th>
                    <th width="160">Description</th>
                    <th width="160">Created</th>
                    <th witdh="160">Status</th>
                    <th witdh="160">Action</th>
                  </tr>

                </table>
              </div>
            </div>

          </div>
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->


<script>
 
    $(function(){
     
      $'.textarea'.summernote()({
      height:'400px';
    }) 
  })
</script>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url();?>public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url();?>public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url();?>public/dist/js/adminlte.min.js"></script>

<script src="<?= base_url();?>public/plugins/summernote/summernote-bs4.js"></script>



</body>
</html>
