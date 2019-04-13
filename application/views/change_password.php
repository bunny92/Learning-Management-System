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
  <body class="menubar-hoverable header-fixed" style="background-color: #f7e1b2;">

    <!-- BEGIN LOGIN SECTION -->
    <section class="section-account">
    
      <div class="spacer"></div>
      <center>
          <span class="text-lg text-bold text-danger" style="color: white;">CHANGE PASSWORD</span>
              <br/><br/>
      </center>
       
      <div class="card contain-sm">

        <div class="card-body">
          <div class="row">
            <div class="col-sm-5 col-sm-offset-1 text-center">
             <img src="<?php echo base_url()?>images/password.png">
             
                </div>
            <div class="col-sm-6">
              <center>
              <span style="color: red;" id="error"><?php if( $this->session->flashdata("messagePr") !== NULL) {echo $this->session->flashdata("messagePr"); }?></span>
              <br/>   
              </center>

             <form class="form" method="post" action="<?php echo base_url().'dashboard/add_edit' ?>">
                <div class="form-group">
                <input type ="hidden" name="login" value="login"/>
                     <input type="password" id="currentpassword" name="currentpassword" class="form-control" required>
                     <label for="currentpassword">Current Password:</label>
                </div>
                <div class="form-group">
                <input type ="hidden" name="login" value="login"/>
                    <input type="password" name="password" class="form-control"  id="password" required>
                    <label for="password1">New Password:</label>
                </div>
                <div class="form-group">
                  <input type="password"  name="confirmPassword" id="password1" class="form-control" required>
                    <label for="password1">Confirm Password:</label>
                </div>
                <br/>
             
                   <div class="row">
                  <div class="col-xs-6 col-sm-6 col-sm-offset-3">
                    <input type="hidden" name="id" value="<?php echo isset($user_data[0]->id)?$user_data[0]->id:''; ?>">
              <input type="hidden" name="user_type" value="<?php echo isset($user_data[0]->user_type)?$user_data[0]->user_type:''; ?>">
                    <button class="btn btn-warning btn-raised" type="submit">Change Password</button>
                  </div><!--end .col -->
                 
                </div><!--end .row -->
              </form>
            </div><!--end .col -->
          <!--end .col -->
              </div><!--end .row -->
            </div><!--end .card-body -->
          </div><!--end .card -->
          <center>
            <a href="<?php echo base_url()?>dashboard" class="btn btn-danger btn-raised" >Dashboard</a>
          </center>
      

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
