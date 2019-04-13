<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Material Admin - Login</title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <!-- END META -->

    <!-- BEGIN STYLESHEETS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/theme-default/bootstrap.css?1422792965" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/theme-default/materialadmin.css?1425466319" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/theme-default/font-awesome.min.css?1422529194" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/theme-default/material-design-iconic-font.min.css?1421434286" />
    <!-- END STYLESHEETS -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/libs/utils/html5shiv.js?1403934957"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/libs/utils/respond.min.js?1403934956"></script>
    <![endif]-->
  </head>
  <body class="menubar-hoverable header-fixed" style="background-color: grey;">

    <!-- BEGIN LOGIN SECTION -->
    <section class="section-account">
    
      <div class="spacer"></div>
      <center>
          <span class="text-lg text-bold text-danger" style="color: white;">LEARNING MANAGEMENT SYSTEM</span>
              <br/><br/>
      </center>
       
      <div class="card contain-sm">

        <div class="card-body">
          <div class="row">
            <div class="col-sm-5 col-sm-offset-1 text-center">
             <img src="<?php echo base_url()?>images/login.png">
             
                </div>
            <div class="col-sm-6">
              <center>
              <span style="color: red;" id="error"><?php if($this->session->flashdata("response") !== NULL) {echo $this->session->flashdata("response");} ?></span>
              <br/>   
              </center>
               <form class="form" action="<?php echo base_url().'login/auth_user'; ?>" method="post">
                <div class="form-group">
                <input type ="hidden" name="login" value="login"/>
                  <input type="text" class="form-control" name ="email" id="email" required>
                  <label for="email">Username / Register ID</label>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" id="pwd" required>
                  <label for="pwd">Password</label>
                  <p class="help-block"><a href="#">Forgotten?</a></p>
                </div>
                <br/>
             
                   <div class="row">
                  <div class="col-xs-6 col-sm-6 col-sm-offset-3">
                    <button class="btn btn-danger btn-raised" type="submit">Login</button>
                  </div><!--end .col -->
                 
                </div><!--end .row -->
              </form>
            </div><!--end .col -->
          <!--end .col -->
              </div><!--end .row -->
            </div><!--end .card-body -->
          </div><!--end .card -->
        </section>
        <!-- END LOGIN SECTION -->

        <!-- BEGIN JAVASCRIPT -->
        <script src="<?php echo base_url() ?>assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/libs/bootstrap/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/libs/spin.js/spin.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/libs/autosize/jquery.autosize.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/core/source/App.js"></script>
        <script src="<?php echo base_url() ?>assets/js/core/source/AppNavigation.js"></script>
        <script src="<?php echo base_url() ?>assets/js/core/source/AppOffcanvas.js"></script>
        <script src="<?php echo base_url() ?>assets/js/core/source/AppCard.js"></script>
        <script src="<?php echo base_url() ?>assets/js/core/source/AppForm.js"></script>
        <script src="<?php echo base_url() ?>assets/js/core/source/AppNavSearch.js"></script>
        <script src="<?php echo base_url() ?>assets/js/core/source/AppVendor.js"></script>
        <script src="<?php echo base_url() ?>assets/js/core/demo/Demo.js"></script>
        <!-- END JAVASCRIPT -->

      </body>
    </html>
