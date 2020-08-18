<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Recut Dashboard</title>
  <link rel="icon" href="<?php echo base_url() ?>assets/mas_icon.png" type="image/x-icon"/>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link rel="stylesheet" href="<?php echo base_url() ?>dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="<?php echo base_url() ?>dist/css/ready.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>dist/css/demo.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.css">

  <style>
        @font-face {
        font-family: "Nunito";
        src: url("<?php echo base_url() ?>/assets/vendor/Nunito/Nunito-Regular.ttf");
            }
          body{
            font-family: 'Nunito';
          }
      @media (min-width: 768px){
        .row-relative {position: relative;}
        .col-border-padding {padding-left: 15px;}
        .col-border{
            padding-left: 0px;
            position: static;
        }
        .col-border:before{
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            border-left: 1px solid black;
        }
    }
  </style>
    
</head>
<body>
    <div class="wrapper">
        <div class="main-header">
            <div class="logo-header">
                <a href="index.html" class="logo">
                    <img src="<?php echo base_url('assets/mas_icon.png') ?>" alt="" height="30"> Recut System
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
            </div>
            <nav class="navbar navbar-header navbar-expand-lg">
                <div class="container-fluid">  
                    <form class="navbar-left navbar-form nav-search mr-md-3" action="">
                        <img src="<?php echo base_url('assets/logo-big2.png') ?>" alt="" height="30">    
                    </form>                              
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">                        
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src="<?php echo base_url() ?>dist/img/user.jpg" alt="user-img" width="36" class="img-circle"><span ><?php echo $this->session->userdata('username'); ?></span></span> </a>
                            <ul class="dropdown-menu dropdown-user">
                                
                                    <a class="dropdown-item" href="<?php echo base_url('welcome/logout') ?>"><i class="fa fa-power-off"></i> Logout</a>
                                </ul>
                                <!-- /.dropdown-user -->
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="sidebar">
                <div class="scrollbar-inner sidebar-wrapper">                    
                    <ul class="nav">
                        <li class="nav-item <?php if($this->uri->segment(2) == ''){echo 'active';} ?>">
                            <a href="<?php echo base_url('admin') ?>">
                                <i class="la la-dashboard"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if($this->uri->segment(2) == 'request_panty'){echo 'active';} ?>">
                            <a href="<?php echo base_url('admin/request_panty') ?>">
                                <i class="la la-cut"></i>
                                <p>Recut Panty</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if($this->uri->segment(2) == 'request_bra'){echo 'active';} ?>">
                            <a href="<?php echo base_url('admin/request_bra') ?>">
                                <i class="la la-cut"></i>
                                <p>Recut Bra</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if($this->uri->segment(2) == 'request_mask'){echo 'active';} ?>">
                            <a href="<?php echo base_url('admin/request_mask') ?>">
                                <i class="la la-cut"></i>
                                <p>Recut Mask</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if($this->uri->segment(2) == 'request_apparel'){echo 'active';} ?>">
                            <a href="<?php echo base_url('admin/request_apparel') ?>">
                                <i class="la la-cut"></i>
                                <p>Recut Apparel</p>
                            </a>
                        </li>
                        <?php if ($this->session->userdata('level')== "CUTTING") { ?>
                        <li class="nav-item <?php if($this->uri->segment(2) == 'user'){echo 'active';} ?>">
                            <a href="<?php echo base_url('admin/user') ?>">
                                <i class="la la-user"></i>
                                <p>User</p>
                            </a>
                        </li>                        
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="main-panel">
                <div class="content">
                    <div class="container-fluid">
                        <?php $this->load->view($content); ?>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<div id="wait" style="display:none;width:auto;height:89px;position:absolute;top:50%;left:43%;padding:2px;"><img src='<?php echo base_url() ?>assets/ring.gif'/><br></div>

</body>
<script src="<?php echo base_url() ?>dist/js/core/jquery.3.2.1.min.js"></script>
<script src="<?php echo base_url() ?>dist/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="<?php echo base_url() ?>dist/js/core/popper.min.js"></script>
<script src="<?php echo base_url() ?>dist/js/core/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>dist/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="<?php echo base_url() ?>dist/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script src="<?php echo base_url() ?>dist/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="<?php echo base_url() ?>dist/js/ready.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script>
     $('#example').DataTable();   
     $('#example2').DataTable();   
      $(document).ajaxStart(function(){
        $("#wait").css("display", "block");
    });
    $(document).ajaxComplete(function(){
        $("#wait").css("display", "none");
    });
</script>
</html>