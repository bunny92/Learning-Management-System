
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
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/theme-default/libs/DataTables/jquery.dataTables.css?1423553989" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/theme-default/libs/DataTables/extensions/dataTables.colVis.css?1423553990" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/theme-default/libs/DataTables/extensions/dataTables.tableTools.css?1423553990" />
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
                  <small>LMS USER</small>
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
            <div class="col-md-12">
          <br/><br/>
           <center> 
                    <img src="<?php echo base_url() ?>/images/timetable.png">
                   <br/><br/>
                      <?php if((isset($user_data[0]->user_type)?$user_data[0]->user_type:'') =='admin') { ?>
                     <button class="btn btn-warning btn-raised" data-toggle="modal" data-target="#addModal">Upload Timetable</button>
                     <?php } ?>
            </center>
         </div>
            <div class="row">
            <div class="col-md-12">
                      <?php if($this->session->flashdata("messagePr")){ ?>
                    
                      <span class="text-danger"> <?php echo $this->session->flashdata("messagePr")?></span>
                   
                    <?php } ?>
                          </div>
       
              <div class="col-lg-12">
                <div class="table-responsive">
                  <br/>  <br/>
                  <table id="datatable1" class="table table-striped table-hover">
                    <thead>
                                                <th>ID</th>
                                                <th>Branch</th>
                                                <th>Year</th>
                                                <th>Semister</th>
                                                <th>Recent Date</th>
                                                <th>Time Tabel</th>
                                                <?php if((isset($user_data[0]->user_type)?$user_data[0]->user_type:'') =='admin') { ?>
                                                <th>Action</th>
                                                 <?php } ?>
                    </thead>
                           <tbody>
                      <?php
                          $index = 0;
                          foreach($onlinetest as $value) {
                      ?>
                      <tr>
                        <td><?= ++$index?></td>
                        <td><?= $value->branch; ?></td>
                        <td><?= $value->year; ?></td>
                        <td><?= $value->semister; ?></td>
                        <td><?= $value->updated_date; ?></td>
                        <td><a class="text-warning" href="<?php echo base_url();?>images/<?php echo $value->file ?>">view</a></td>
                        <?php if((isset($user_data[0]->user_type)?$user_data[0]->user_type:'') =='admin') { ?>
                        <td><a style="color: red;" href="<?php echo base_url()?>dashboard/delete_time_table/<?= $value->id?>">Delete</a></td>
                        <?php } ?>
                      </tr>
                      <?php } ?>
                      </tbody>
                  </table>
                </div><!--end .table-responsive -->
              </div><!--end .col -->
            </div><!--end .row -->
        </section>
      </div><!--end #content-->
      <!-- END CONTENT -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <center>
      
               <h4 class="modal-title text-danger" id="formModalLabel">UPLOAD UPDATED TIME TABLE</h4>   
        </center>
      </div>
      <form class="form-horizontal" role="form" action="<?php echo base_url().'dashboard/upload_timetable'?>" method="post"   enctype="multipart/form-data">
        <div class="modal-body">

          <div class="form-group">
               <div class="col-sm-2">
              <label for="department" class="control-label">Branch :</label>
            </div>
            <div class="col-sm-4">
                <select id="department" name="branch" class="form-control" required>
                     <option  value="">Select your Branch</option>
                     <option  value="CSE">Computer Science</option>
                     <option  value="MECH">Mechanical</option>
                     <option  value="CIVIL">Civil</option>
                     <option  value="ECE">ECE</option>
                     <option  value="EEE">EEE</option>
                     <option  value="IT">IT</option>
                     <option  value="BIO">BIO TECH</option>
               </select>
            </div>

          </div>

            <div class="form-group">
            <div class="col-sm-2">
              <label for="year" class="control-label">Year :</label>
            </div>
            <div class="col-sm-4">
               <select id="year" name="year" class="form-control" required="required">
                             <option  value="1">1</option>
                             <option  value="2">2</option>
                             <option  value="3">3</option>
                             <option  value="4">4</option>
               </select>
            </div>
         
            <div class="col-sm-2">
              <label for="semister" class="control-label">Semister :</label>
            </div>
            <div class="col-sm-4">
              <select id="semister" name="semister" class="form-control" required="required">
                             <option  value="1">1</option>
                             <option  value="2">2</option>
               </select>
            </div>
           </div>

                <div class="form-group">
             <br><br>
            <div class="col-sm-12">
              <div class="input-group">
                <label class="input-group-btn">
                    <span class="btn btn-primary">
                        File&hellip; <input type="file" name="file" id="file" style="display: none;" required>
                    </span>
                </label>
                <input type="text" class="form-control" readonly>
            </div>
            </div>
          </div>
      </div>
          <div class="modal-footer">
     
         <center><button type="submit" class="btn btn-warning">Add Student</button>
          </center>
        </div>
      
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!--End Modal Crud -->

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
            <li>
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
               <li  class="active">
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
            <li>
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
                <div class="gui-icon"><i class="md md-account-circle"></i></div>
                <span class="title">Student Details</span>
              </a>
            </li>
              <li class="active">
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
                <div class="gui-icon"><i class="md md-assessment"></i></div>
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
                <div class="gui-icon"><i class="md md-assessment"></i></div>
                <span class="title">Student Report</span>
              </a>
            </li>
            </ul>
                    <?php }else {?>
                 <ul id="main-menu" class="gui-controls">
            <li>
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
            <li class="active">
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
    <script src="<?php echo base_url() ?>assets/js/libs/DataTables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/libs/DataTables/extensions/ColVis/js/dataTables.colVis.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/libs/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/core/source/App.js"></script>
    <script src="<?php echo base_url() ?>assets/js/core/source/AppNavigation.js"></script>
    <script src="<?php echo base_url() ?>assets/js/core/source/AppOffcanvas.js"></script>
    <script src="<?php echo base_url() ?>assets/js/core/source/AppCard.js"></script>
    <script src="<?php echo base_url() ?>assets/js/core/source/AppForm.js"></script>
    <script src="<?php echo base_url() ?>assets/js/core/source/AppNavSearch.js"></script>
    <script src="<?php echo base_url() ?>assets/js/core/source/AppVendor.js"></script>
    <script src="<?php echo base_url() ?>assets/js/core/demo/Demo.js"></script>
    <script src="<?php echo base_url() ?>assets/js/core/demo/DemoTableDynamic.js"></script>

  </body>
</html>
