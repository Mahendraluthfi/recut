<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Recut System</title>
  <link rel="icon" href="<?php echo base_url() ?>assets/mas_icon.png" type="image/x-icon"/>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet"> -->

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url() ?>assets/css/scrolling-nav.css" rel="stylesheet">
  <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"> -->
  <link href="<?php echo base_url() ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.css">
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
  <link href="<?php echo base_url() ?>assets/vendor/select2/css/select2.min.css" rel="stylesheet" />
  <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/select2/js/select2.min.js"></script>

</head>
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
<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="<?php echo base_url() ?>assets/mas_icon.png" alt="" height="25" style="margin-bottom: 5px;"> MAS SUMBIRI</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <?php if (empty($this->session->userdata('epf'))) { ?>
            <a class="nav-link btn btn-success btn-sm text-white" href="#" onclick="login()"><i class="fa fa-sign-in"></i> Login</a>
            <?php }else{ ?>
            <a class="nav-link btn btn-success btn-sm text-white" href="<?php echo base_url('admin') ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
            <?php } ?>
          </li>          
        </ul>
      </div>
    </div>
  </nav>

  <?php $this->load->view($content); ?>
    
  <div class="modal fade" id="modal-id">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Login</h4>
          <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
        </div>
        <div class="modal-body">
            <form id="loginform">
                  <div class="form-group">
                    <div class="alert alert-danger" style="display: none;">
                        <strong>EPF or Password is wrong !</strong>
                    </div>
                    <label for="exampleInputEmail1">EPF</label>
                    <input type="text" name="epf" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter EPF Number">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>                  
             </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary login-btn"><i class="fa fa-sign-in-alt"></i> Login</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<div id="wait" style="display:none;width:auto;height:89px;position:absolute;top:50%;left:43%;padding:2px;"><img src='<?php echo base_url() ?>assets/demo_wait.gif'/><br>Loading ...</div>


  <!-- Footer -->
  <!-- <footer class="py-3 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; MAS Sumbiri Autonomation 2020</p>
    </div>
  </footer> -->
    <!-- /.container -->

  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom JavaScript for this theme -->
  <script src="<?php echo base_url() ?>assets/js/scrolling-nav.js"></script>
  <script>
    function login() {
      // body...
      $('#modal-id').modal('show');
    }

    $('#example').DataTable();
    $('#example2').DataTable();
    $('#example3').DataTable();
    $('#example4').DataTable();
    $('.select2').select2();
    $(".login-btn").click(function(){
        
        url = "<?php echo site_url('index.php/welcome/login')?>";                              
          $.ajax({
            url : url,
            type: "POST",
            data: $('#loginform').serialize(),            
            dataType: "JSON",
            success: function(data)
            {               
                if (data == true) {
                    window.location.href = '<?php echo base_url('admin') ?>';
                }else{
                    $('.alert-danger').css('display','block');
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }); 

    $(document).ajaxStart(function(){
        $("#wait").css("display", "block");
    });
    $(document).ajaxComplete(function(){
        $("#wait").css("display", "none");
    });
  </script>
</body>

</html>
