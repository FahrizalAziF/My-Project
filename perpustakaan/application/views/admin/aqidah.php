<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>DataTables | Gentelella</title>

  <!-- Bootstrap -->
  <link href="<?php echo base_url('admin/vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php echo base_url('admin/vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?php echo base_url('admin/vendors/nprogress/nprogress.css') ?>" rel="stylesheet">
  <!-- iCheck -->
  <link href="<?php echo base_url('admin/vendors/iCheck/skins/flat/green.css') ?>" rel="stylesheet">
  <!-- Datatables -->
  <link href="<?php echo base_url('admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('admin/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('admin/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('admin/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('admin/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') ?>" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?php echo base_url('admin/build/css/custom.min.css') ?>" rel="stylesheet">
  <style>
    .cover img {
      width: 60px;
      height: 80px;
    }
  </style>
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title">Perpus Al-Khairat</span></a>
          </div>

          <div class="clearfix"></div>



          <?php
          include('header.php');
          ?>


        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="images/img.jpg" alt="">Admin
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li>
                    <a href="<?php echo base_url('admin/logout') ?>"> <i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="simpan btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Al-Qur'an <small>Gunakan pencarian agar lebih mudah</small></h3>
            </div>
          </div>

          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2 class="col-md-2 col-xs-2">Al-Qur'an</h2>
                  <?php echo $this->session->flashdata('delete'); ?><?php echo $this->session->flashdata('ubah'); ?>

                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content cover">
                  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Tanggal Terbit</th>
                        <th>Jumlah Halaman</th>
                        <th>File Buku</th>
                        <th>Cover</th>
                        <th>Edit</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($aqidah as $a) : ?>
                        <tr>
                          <td><?php echo $a->nama_buku ?></td>
                          <td><?php echo $a->penulis ?></td>
                          <td><?php echo $a->terbit ?></td>
                          <td><?php echo $a->halaman ?></td>
                          <td><a class="blue-text" href="<?php echo base_url('./upload/cover/' . $a->buku) ?>" target="_blank"><?php echo $a->buku ?></a></td>
                          <td><img src="<?php echo base_url('./upload/cover/' . $a->cover) ?>" alt=""></td>
                          <td>
                            <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                            <a href="<?php echo site_url('admin/edit/' . $a->id_buku) ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                            <a href="<?php echo site_url('admin/delete/' . $a->id_buku) ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /page content -->

      <!-- footer content -->
      <footer>
        <div class="pull-right">
          Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>

  <!-- jQuery -->
  <script src="<?php echo base_url('admin/vendors/jquery/dist/jquery.min.js') ?>"></script>
  <!-- Bootstrap -->
  <script src="<?php echo base_url('admin/vendors/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url('admin/vendors/fastclick/lib/fastclick.js') ?>"></script>
  <!-- NProgress -->
  <script src="<?php echo base_url('admin/vendors/nprogress/nprogress.js') ?>"></script>
  <!-- iCheck -->
  <script src="<?php echo base_url('admin/vendors/iCheck/icheck.min.js') ?>"></script>
  <!-- Datatables -->
  <script src="<?php echo base_url('admin/vendors/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
  <script src="<?php echo base_url('admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
  <script src="<?php echo base_url('admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') ?>"></script>
  <script src="<?php echo base_url('admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') ?>"></script>
  <script src="<?php echo base_url('admin/vendors/datatables.net-buttons/js/buttons.flash.min.js') ?>"></script>
  <script src="<?php echo base_url('admin/vendors/datatables.net-buttons/js/buttons.html5.min.js') ?>"></script>
  <script src="<?php echo base_url('admin/vendors/datatables.net-buttons/js/buttons.print.min.js') ?>"></script>
  <script src="<?php echo base_url('admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') ?>"></script>
  <script src="<?php echo base_url('admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') ?>"></script>
  <script src="<?php echo base_url('admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') ?>"></script>
  <script src="<?php echo base_url('admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') ?>"></script>
  <script src="<?php echo base_url('admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') ?>"></script>
  <script src="<?php echo base_url('admin/vendors/jszip/dist/jszip.min.js') ?>"></script>
  <script src="<?php echo base_url('admin/vendors/pdfmake/build/pdfmake.min.js') ?>"></script>
  <script src="<?php echo base_url('admin/vendors/pdfmake/build/vfs_fonts.js') ?>"></script>

  <!-- Custom Theme Scripts -->
  <script src="<?php echo base_url('admin/build/js/custom.min.js') ?>"></script>

</body>

</html>