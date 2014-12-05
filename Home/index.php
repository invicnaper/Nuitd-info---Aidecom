<?php  
/*
 * Aidecome open source plateforme developed for The nuit d'info
 * it helps you to create your own communication plateforme (web site)
 * 
 */

require_once("../modules/config.aidecom.php"); 
require_once("../modules/register.aidecom.php");
require_once("../modules/login_modules.aidecom.php");
include("../modules/login.aidecom.php");
require_once("../modules/session.aidecom.php");
$register = new register;
$new_session = new session;
$register->module_activated();
$nb_errors = 0;
$check_mail = $register->check_email($nb_errors);
$module_f = new module_found; 
//$new_session = new session;
if(isset($_GET['email'])){
    $check = $module_f->account_email($module_f,$_GET['email']);
}
else {
    $check = 0;
}
$new_session->redirect_to_home();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $name; ?> | Home</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- fullCalendar -->
    <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-blue">
<!-- header logo: style can be found in header.less -->
<header class="header">
<a href="index.php" class="logo">
    <!-- Add the class icon to your logo image or logo icon to add the margining -->
    <?php echo $name; ?>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
<!-- Sidebar toggle button-->
<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</a>
<div class="navbar-right">
<ul class="nav navbar-nav">
<!-- Messages: style can be found in dropdown.less-->
<!-- User Account: style can be found in dropdown.less -->

</ul>
</div>
</nav>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">
<!-- Left side column. contains the logo and sidebar -->
<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?php  include("inc/menu.aidecom.php");  ?>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Aidecom vous permet de communiquer avec des organismes
       
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Bienvenue</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-maroon">
            <div class="inner">
                <h3>
                    150
                </h3>
                <p>
                    Demandes
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-group"></i>
            </div>
            <a href="#" class="small-box-footer">
                voir plus <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>
                    53<sup style="font-size: 20px">%</sup>
                </h3>
                <p>
                    Connection par jour
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-sign-in"></i>
            </div>
            <a href="#" class="small-box-footer">
                voir plus <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>
                    44
                </h3>
                <p>
                    Inscription
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">
                Voir plus <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>
                    65
                </h3>
                <p>
                    Visiteurs par jour
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">
                voir plus <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
</div><!-- /.row -->

<!-- top row -->
<div class="row">
    <div class="col-xs-12 connectedSortable">

    </div><!-- /.col -->
</div>
<!-- /.row -->

<!-- Main row -->
<div class="row">
<!-- Left col -->
<section class="col-lg-6 connectedSortable">
    <!-- Box (with bar chart) -->
    
    <!-- Custom tabs (Charts with tabs)-->

    <!-- quick email widget -->
    <?php if($check_mail == 1){ ?>
          <!-- Danger box -->
                            <div class="box box-solid box-danger">
                                <div class="box-header">
                                    <h3 class="box-title">Inscription</h3>
                                    <div class="box-tools pull-right">
                                        
                                    </div>
                                </div>
                                <div class="box-body">
                                    
                                    <p>
                                       <b><?php if(isset($_POST['email'])){ echo $_POST['email']; } ?></b>, existe dejà
                                    </p>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->                      

    <?php } ?>
     <?php  
    
    if (isset($_GET['action']) && $_GET['action'] == "done"){?>
        <div class="box box-success">
                                <div class="box-header">
                                    <h3 class="box-title">Inscription validé</h3>
                                    <div class="box-tools pull-right">
                                        <div class="btn-group" data-toggle="btn-toggle">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <p>
                                    <b><?php if(isset($_POST['email'])){ echo $_POST['email']; } ?>
                                        Votre inscription sur notre plateforme est validé , vous pouvez
                                        déormais accéder à votre espace client
                                    </p>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
    <?php  }else{ ?>
    <div class="box box-info">
        <div class="box-header">
            <i class="fa fa-group"></i>
            <h3 class="box-title">Inscription</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
                <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div><!-- /. tools -->
        </div>
        <div class="box-body">
        <form role="form" method="post"action="index.php?action=do" name="page_form" id="page_form">
                <div id="div_email" class="form-group">
                    <input onblur="check_email(this)" type="email" class="form-control" name="email" placeholder="Email"/>
                </div>
                <div id="div_pass" class="form-group">
                    <input onblur="check_password(this)" type="text" class="form-control" name="pass" placeholder="Password"/>
                </div>
                <div id="div_pays" class="form-group">
                    <input onblur="check_pays(this)" type="text" class="form-control" name="Pays" placeholder="Pays"/>
                </div>
                <div id="div_ville" class="form-group">
                    <input onblur="check_city(this)" type="text" class="form-control" name="ville" placeholder="ville"/>
                </div>
                <div id="div_lname" class="form-group">
                    <input onblur="check_lname(this)" type="text" class="form-control" name="lname" placeholder="Votre nom"/>
                </div>
                <div id="div_fname" class="form-group">
                    <input onblur="check_fname(this)" type="text" class="form-control" name="fname" placeholder="Votre prénom"/>
                </div>
            
        </div>
        <div class="box-footer clearfix">
           <input type="submit" name="submit" id="submit" class="btn btn-info" value="Inscription" />
           <input type="hidden" name="MM_insert" value="page_form" />  
        </div>
        </form>
        
    </div>
<?php }
        ?>
</section><!-- /.Left col -->
<!-- right col (We are only adding the ID to make the widgets sortable)-->
<section class="col-lg-6 connectedSortable">
<!-- /.box -->

<!-- Chat box -->


<!-- TO DO List -->
<?php if(isset($_GET['action']) && $_GET['action'] == "error"){ ?>
          <!-- Danger box -->
                            <div class="box box-solid box-danger">
                                <div class="box-header">
                                    <h3 class="box-title">Connection</h3>
                                    <div class="box-tools pull-right">
                                        
                                    </div>
                                </div>
                                <div class="box-body">
                                    
                                    <p>
                                       Nom du compte ou mot de passe invalide
                                    </p>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->                      

    <?php } ?>
<div class="box box-warning">
        <div class="box-header">
            <i class="fa fa-sign-in"></i>
            <h3 class="box-title">Connection</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
                <button class="btn btn-warning btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div><!-- /. tools -->
        </div>
        <div class="box-body">
            <form action="#" method="post">
                <div class="form-group">
                    <input id ="email" type="email" class="form-control" name="email_con" placeholder="Email"/>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control box-danger" name="password" placeholder="Password"/>
                </div>
             <a class="btn btn-block btn-social btn-facebook">
                                    <i class="fa fa-facebook"></i> Sign in with Facebook
                                    </a>
                                    <a class="btn btn-block btn-social btn-twitter">
                                        <i class="fa fa-twitter"></i> Sign in with Twitter
                                    </a>
                                    <p>&nbsp;</p>
                                       <input type="checkbox" class="minimal-red"/>
                                            Garder ma session active
                                        </label>
        </div>
        <div class="box-footer clearfix">

           <input type="submit" name="submit" id="submit" class="btn btn-warning" value="Connection" />
        </div>
        </form>
    </div>

</section><!-- right col -->
</div><!-- /.row (main row) -->

</section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<!-- add new calendar event modal -->


<!-- jQuery 2.0.2 -->
<script src="js/jquery.min.js"></script>
<!-- jQuery UI 1.10.3 -->
<script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<!-- Morris.js charts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
<!-- Sparkline -->
<script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- jvectormap -->
<script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
<script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<!-- fullCalendar -->
<script src="js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

<!-- AdminLTE App -->
<script src="js/AdminLTE/app.js" type="text/javascript"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>

<!-- aidecom function js -->
<script src="js/function.aidecom.js"></script>

</body>
</html>