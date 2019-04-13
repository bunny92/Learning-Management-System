
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>LMS | Dashboard</title>

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
  <body class="menubar-hoverable menubar-first menubar-pin ">

    <!-- BEGIN HEADER-->
    <header id="header" >
      <div class="headerbar">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="headerbar-left">
          <ul class="header-nav header-nav-options">
            <li class="header-nav-brand" >
              <div class="brand-holder">
                <a href="../../html/dashboards/dashboard.html">
                  <span class="text-lg text-bold" style="color: white;">LMS</span>
                </a>
              </div>
            </li>
               <li class="header-nav-brand" >
            <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
              <i class="fa fa-bars"></i>
            </a>
            </li>
         
          </ul>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="headerbar-right">
        
          <ul class="header-nav header-nav-profile">
            <li class="dropdown">
              <a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
                <img src="<?php echo base_url() ?>images/user.png" alt="" />
                <span class="profile-info">
                    <?php if($user_data[0]->user_type =='admin') { ?>
                     Adminstrator
                    <?php } elseif($user_data[0]->user_type =='Professor') { ?>
                     Professor
                    <?php }else {?>
                     Student
                    <?php }?> 
                  <small><?php echo (isset($user_data[0]->register_id)?$user_data[0]->register_id:'');?></small>
                </span>
              </a>
              <ul class="dropdown-menu animation-dock">
                <li class="dropdown-header">Config</li>
                <li><a href="<?php echo base_url();?>/dashboard">My profile</a></li>
                <li><a href="<?php echo base_url();?>/dashboard/change_password">Change Password</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo base_url() ?>login/logout"><i class="fa fa-fw fa-power-off text-danger"></i> Logout</a></li>
              </ul><!--end .dropdown-menu -->
            </li><!--end .dropdown -->
          </ul><!--end .header-nav-profile -->
        
        </div><!--end #header-navbar-collapse -->
      </div>
    </header>
    <!-- END HEADER-->

    <!-- BEGIN BASE-->
    <div id="base">

      <!-- BEGIN OFFCANVAS LEFT -->
      <div class="offcanvas">
      </div><!--end .offcanvas-->
      <!-- END OFFCANVAS LEFT -->

      <!-- BEGIN CONTENT-->
      <div id="content">

        <!-- BEGIN LIST SAMPLES -->
        <section>
        <br/>
         <center>
         <?php if($user_data[0]->user_type =='admin') { ?>
                    <img src="<?php echo base_url() ?>/images/admin.png">
                    <?php } elseif($user_data[0]->user_type =='Professor') { ?>
                      <img src="<?php echo base_url() ?>/images/professor.png">
                    <?php }else {?>
                     <img src="<?php echo base_url() ?>/images/student.png">
                    <?php }?>
           
            <p class="lead">  <br/>Welcome to the <b class="text-danger>"><?php if($user_data[0]->user_type =='admin') { ?>
                     Adminstrator
                    <?php } elseif($user_data[0]->user_type =='Professor') { ?>
                     Professor
                    <?php }else {?>
                     Student
                    <?php }?></b></p>
         </center>
         <br/>
         <div class="col-md-8 col-md-offset-2">
                <div class="card card-printable style-default-light">
                 
                  <div class="card-body style-default-bright">

                    <!-- BEGIN INVOICE HEADER -->
                    <div class="row">
                      <div class="col-xs-12">
                      <center>
                         <h1 class="text-light"></i>Your <strong class="text-accent-dark">Profile</strong></h1>
                      </center>
                      </div>
                      
                    </div><!--end .row -->
                    <!-- END INVOICE HEADER -->

                    <br>
                    <!-- BEGIN INVOICE PRODUCTS -->
                    <div class="row">
                      <div class="col-md-12">
                        <table class="table">
                        
                          <tbody>
                              <tr>
                              <td>Name :</td>
                              <td class="text-right"><?php echo (isset($user_data[0]->name)?$user_data[0]->name:'');?></td>
                            </tr>
                            <tr>
                              <td>Email ID :</td>
                              <td class="text-right"><?php echo (isset($user_data[0]->email)?$user_data[0]->email:'');?></td>
                            </tr>
                            <tr>
                            
                              <td>Contact Number :</td>
                              <td class="text-right"> <?php echo (isset($user_data[0]->contact)?$user_data[0]->contact:'');?></td>
                            </tr>
                            <tr>
                              <td>Address :</td>
                              <td class="text-right"> <?php echo (isset($user_data[0]->address)?$user_data[0]->address:'');?></td>
                            </tr>
                             <tr>
                              <td>City :</td>
                              <td class="text-right"> <?php echo (isset($user_data[0]->city)?$user_data[0]->city:'');?></td>
                            </tr>
                             <tr>
                              <td>Date of Birth :</td>
                              <td class="text-right"><?php echo (isset($user_data[0]->date_of_birth)?$user_data[0]->date_of_birth:'');?></td>
                            </tr>
                             <tr>
                              <td>Date of Join :</td>
                              <td class="text-right"><?php echo (isset($user_data[0]->date_of_join)?$user_data[0]->date_of_join:'');?></td>
                            </tr>
                             <tr>
                              <td>Change Password :</td>
                              <td class="text-right"><a class="btn btn-danger btn-raised" href="<?php echo base_url() ?>dashboard/change_password/">Click to Change</a></td>
                            </tr>
                            
                          </tbody>
                        </table>
                      </div><!--end .col -->
                    </div><!--end .row -->
                    <!-- END INVOICE PRODUCTS -->

                  </div><!--end .card-body -->
                </div><!--end .card -->
              </div>
        </section>
      </div><!--end #content-->
      <!-- END CONTENT -->

      <!-- BEGIN MENUBAR-->
      <div id="menubar" class="menubar-inverse" style="background-color: white;">
        <div class="menubar-fixed-panel">
          <div>
            <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
              <i class="fa fa-bars"></i>
            </a>
          </div>
          <div class="expanded">
             <a href="<?php echo base_url()?>dashboard" >
              <span class="text-lg text-bold" style="color: white;">LMS</span>
            </a>
          </div>
        </div>
        <div class="menubar-scroll-panel">

                  <?php if($user_data[0]->user_type =='admin') { ?>
                     <ul id="main-menu" class="gui-controls">
            <li class="active">
              <a href="<?php echo base_url()?>dashboard" >
                <div class="gui-icon"><i class="md md-home"></i></div>
                <span class="title">Dashboard</span>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url()?>dashboard/users_student" >
                <div class="gui-icon"><i class="md md-account-circle"></i></div>
                <span class="title">Student Account</span>
              </a>
            </li>
               <li>
              <a href="<?php echo base_url()?>dashboard/users_professor" >
                <div class="gui-icon"><i class="md md-account-box"></i></div>
                <span class="title">Faculty Account</span>
              </a>
            </li>
               <li>
              <a href="<?php echo base_url()?>dashboard/time_table" >
                <div class="gui-icon"><i class="md md-assessment"></i></div>
                <span class="title">Time Table</span>
              </a>
            </li>
               <li>
              <a href="<?php echo base_url()?>dashboard/subjects" >
                <div class="gui-icon"><i class="md md-account-balance-wallet"></i></div>
                <span class="title">Subjects</span>
              </a>
            </li>
              <li>
              <a href="<?php echo base_url()?>user/feedback" >
                <div class="gui-icon"><i class="md md-visibility-off"></i></div>
                <span class="title">Monitering</span>
              </a>
            </li>
              <li>
              <a href="<?php echo base_url()?>user/results" >
                <div class="gui-icon"><i class="md md-accessibility"></i></div>
                <span class="title">Results</span>
              </a>
            </li>
            </ul>
                    <?php } elseif($user_data[0]->user_type =='Professor') { ?>
                      <ul id="main-menu" class="gui-controls">
           <li class="active">
              <a href="<?php echo base_url()?>dashboard" >
                <div class="gui-icon"><i class="md md-home"></i></div>
                <span class="title">Dashboard</span>
              </a>
            </li>
               <li>
              <a href="<?php echo base_url()?>dashboard/subjects" >
                <div class="gui-icon"><i class="md md-account-balance-wallet"></i></div>
                <span class="title">Subjects</span>
              </a>
            </li>
             <li>
              <a href="<?php echo base_url()?>dashboard/users_student" >
                <div class="gui-icon"><i class="md md-account-child"></i></div>
                <span class="title">Student Details</span>
              </a>
            </li>
              <li>
              <a href="<?php echo base_url()?>dashboard/time_table" >
                <div class="gui-icon"><i class="md md-assessment"></i></div>
                <span class="title">Time Table</span>
              </a>
            </li>
              <li>
              <a href="<?php echo base_url()?>user/attendance" >
                <div class="gui-icon"><i class="md md-assessment"></i></div>
                <span class="title">Daily Attendance</span>
              </a>
            </li>
              <li>
              <a href="<?php echo base_url()?>user/material" >
                <div class="gui-icon"><i class="md md-insert-drive-file"></i></div>
                <span class="title">Material details</span>
              </a>
            </li>
              <li>
              <a href="<?php echo base_url()?>user/onlinetest" >
                <div class="gui-icon"><i class="md md-laptop-windows"></i></div>
                <span class="title">Online Test</span>
              </a>
            </li>
          <li>
              <a href="<?php echo base_url()?>user/assignment" >
                <div class="gui-icon"><i class="md md-assessment"></i></div>
                <span class="title">Assignments</span>
              </a>
            </li>
              <li>
               <a href="<?php echo base_url()?>user/feedback" >
                <div class="gui-icon"><i class="md md-account-circle"></i></div>
                <span class="title">Student Report</span>
              </a>
            </li>
            </ul>
                    <?php }else {?>
                    <ul id="main-menu" class="gui-controls">
            <li class="active">
              <a href="<?php echo base_url()?>dashboard" >
                <div class="gui-icon"><i class="md md-home"></i></div>
                <span class="title">Dashboard</span>
              </a>
            </li>
             <li>
              <a href="<?php echo base_url()?>dashboard/users_professor" >
                <div class="gui-icon"><i class="md md-account-box"></i></div>
                <span class="title">Faculty Details</span>
              </a>
            </li>
               <li>
                <a href="<?php echo base_url()?>dashboard/subjects" >
                <div class="gui-icon"><i class="md md-account-box"></i></div>
                <span class="title">Courses</span>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url()?>dashboard/time_table" >
                <div class="gui-icon"><i class="md md-assessment"></i></div>
                <span class="title">Time Table</span>
              </a>
            </li>
              <li>
               <a href="<?php echo base_url()?>user/attendance" >
                <div class="gui-icon"><i class="md md-content-paste"></i></div>
                <span class="title">Monthly Attendance</span>
              </a>
            </li>
              <li>
              <a href="<?php echo base_url()?>user/material" >
                <div class="gui-icon"><i class="md md-insert-drive-file"></i></div>
                <span class="title">Material details</span>
              </a>
            </li>
              <li>
               <a href="<?php echo base_url()?>user/onlinetest" >
                <div class="gui-icon"><i class="md md-laptop-windows"></i></div>
                <span class="title">Online Test</span>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url()?>user/assignment" >
                <div class="gui-icon"><i class="md md-description"></i></div>
                <span class="title">Assignments</span>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url()?>user/results" >
                <div class="gui-icon"><i class="md md-accessibility"></i></div>
                <span class="title">Results</span>
              </a>
            </li>
             <li>
              <a href="<?php echo base_url()?>user/feedback" >
                <div class="gui-icon"><i class="md md-announcement"></i></div>
                <span class="title">Feedback / Queries / Ideas</span>
              </a>
            </li>

            </ul>
                    <?php }?> 




          <div class="menubar-foot-panel">
            <small class="no-linebreak hidden-folded">
              <span class="opacity-75">Copyright &copy; 2017</span> <strong>B*</strong>
            </small>
          </div>
        </div><!--end .menubar-scroll-panel-->
      </div><!--end #menubar-->
      <!-- END MENUBAR -->


    </div><!--end #base-->
    <!-- END BASE -->

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
    <script src="<?php echo base_url() ?>assets/js/core/demo/DemoLayouts.js"></script>
    <!-- END JAVASCRIPT -->

  </body>
</html>
