
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
    <body class="">

        <!-- BEGIN HEADER-->
        <header id="header" >
            <div class="headerbar">
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="headerbar-right">

                    <ul class="header-nav header-nav-profile">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
                                <img src="<?php echo base_url() ?>images/user.png" alt="" />
                                <span class="profile-info">
                                    <?php if ($user_data[0]->user_type == 'admin') { ?>
                                        Adminstrator
                                    <?php } elseif ($user_data[0]->user_type == 'Professor') { ?>
                                        Professor
                                    <?php } else { ?>
                                        Student
                                    <?php } ?> 
                                    <small>LMS USER</small>
                                </span>
                            </a>
                            <ul class="dropdown-menu animation-dock">
                                <li class="dropdown-header">Config</li>
                                <li><a href="<?php echo base_url(); ?>/dashboard">My profile</a></li>
                                <li><a href="<?php echo base_url(); ?>/dashboard/change_password">Change Password</a></li>
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
                    <br/><br/>
                  <?php foreach($test as $value) { 
                        if ($value->user_id == $user_data[0]->register_id) { ?> 
                         <div class="col-md-6 col-lg-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h1 class="text-primary">You Have Successfully Submited Test</h1>
                                     <p class="lead">
                                           Please contact your Faculty for the results..!
                                        </p>
                                </div><!--end .col -->

                            </div>
                           
                        </div>
                  <?php } } ?>
                    
                    <div class="row">

                        <div class="col-md-6 col-lg-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h1 class="text-primary">Here is your question Paper</h1>
                                </div><!--end .col -->

                            </div>
                            <?php foreach ($onlinetest as $value) { ?>
                                <iframe src="<?php echo base_url() ?>images/<?php echo $value->test ?>" class="col-md-6 col-lg-6" style="height:950px; width: 700px;"></iframe>
                            <?php } ?>

                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="row">
                                <div class="col-lg-12 ">
                                    <h1 class="text-primary">Please choose the Option</h1>
                                </div><!--end .col -->
                                <div class="col-lg-8">
                                    <article class="margin-bottom-xxl text-center">
                                        <p class="lead">
                                            Please select the option with put minimize if it is then automatically
                                            your test will be submited.
                                        </p>
                                    </article>
                                </div><!--end .col -->
                            </div>

                            <form  class="form-horizontal" role="form" action="<?php echo base_url() . 'user/submit_test' ?>" method="post">

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">1.</label>
                                    <div class="col-sm-9">
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="first" value="1"><span>1</span>
                                        </label>
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="first" value="2"><span>2</span>
                                        </label>
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="first" value="3"><span>3</span>
                                        </label>
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="first" value="4"><span>4</span>
                                        </label>
                                    </div><!--end .col -->
                                </div><!--end .form-group -->

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">2.</label>
                                    <div class="col-sm-9">
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="second" value="1"><span>1</span>
                                        </label>
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="second" value="2"><span>2</span>
                                        </label>
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="second" value="3"><span>3</span>
                                        </label>
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="second" value="4"><span>4</span>
                                        </label>
                                    </div><!--end .col -->
                                </div><!--end .form-group -->


                                <div class="form-group">
                                    <label class="col-sm-3 control-label">3.</label>
                                    <div class="col-sm-9">
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="third" value="1"><span>1</span>
                                        </label>
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="third" value="2"><span>2</span>
                                        </label>
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="third" value="3"><span>3</span>
                                        </label>
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="third" value="4"><span>4</span>
                                        </label>
                                    </div><!--end .col -->
                                </div><!--end .form-group -->

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">4.</label>
                                    <div class="col-sm-9">
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="fourth" value="1"><span>1</span>
                                        </label>
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="fourth" value="2"><span>2</span>
                                        </label>
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="fourth" value="3"><span>3</span>
                                        </label>
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="fourth" value="4"><span>4</span>
                                        </label>
                                    </div><!--end .col -->
                                </div><!--end .form-group -->

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">5.</label>
                                    <div class="col-sm-9">
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="fiveth" value="1"><span>1</span>
                                        </label>
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="fiveth" value="2"><span>2</span>
                                        </label>
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="fiveth" value="3"><span>3</span>
                                        </label>
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="fiveth" value="4"><span>4</span>
                                        </label>
                                    </div><!--end .col -->
                                </div><!--end .form-group -->

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">6.</label>
                                    <div class="col-sm-9">
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="sixth" value="1"><span>1</span>
                                        </label>
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="sixth" value="2"><span>2</span>
                                        </label>
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="sixth" value="3"><span>3</span>
                                        </label>
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="sixth" value="4"><span>4</span>
                                        </label>
                                    </div><!--end .col -->
                                </div><!--end .form-group -->

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">7.</label>
                                    <div class="col-sm-9">
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="seventh" value="1"><span>1</span>
                                        </label>
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="seventh" value="2"><span>2</span>
                                        </label>
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="seventh" value="3"><span>3</span>
                                        </label>
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="seventh" value="4"><span>4</span>
                                        </label>
                                    </div><!--end .col -->
                                </div><!--end .form-group -->

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">8.</label>
                                    <div class="col-sm-9">
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="eighth" value="1"><span>1</span>
                                        </label>
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="eighth" value="2"><span>2</span>
                                        </label>
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="eighth" value="3"><span>3</span>
                                        </label>
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="eighth" value="4"><span>4</span>
                                        </label>
                                    </div><!--end .col -->
                                </div><!--end .form-group -->

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">9.</label>
                                    <div class="col-sm-9">
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="nineth" value="1"><span>1</span>
                                        </label>
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="nineth" value="2"><span>2</span>
                                        </label>
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="nineth" value="3"><span>3</span>
                                        </label>
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="nineth" value="4"><span>4</span>
                                        </label>
                                    </div><!--end .col -->
                                </div><!--end .form-group -->

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">10.</label>
                                    <div class="col-sm-9">
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="tenth" value="1"><span>1</span>
                                        </label>
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="tenth" value="2"><span>2</span>
                                        </label>
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="tenth" value="3"><span>3</span>
                                        </label>
                                        <label class="radio-inline radio-styled">
                                            <input type="radio" name="tenth" value="4"><span>4</span>
                                        </label>
                                    </div><!--end .col -->
                                </div><!--end .form-group --> 

                                <center>
                                    <input type="hidden" name="user_id" value="<?php echo (isset($user_data[0]->register_id) ? $user_data[0]->register_id : ''); ?>">
                                    <br/><button type="submit" id="form-submit" class="col-md-10 col-offset-md-1 btn btn-danger">Submit Test</button>
                                </center>

                            </form>
                        </div>

                    </div><!--end .row -->


                </section>
            </div><!--end #content-->


        </div><!--end #base-->
        <!-- END BASE -->

        <!-- BEGIN JAVASCRIPT -->
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

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
        <script>
   
        </script>        
    </body>
</html>
