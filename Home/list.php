<?php
/*
 * Aidecome open source plateforme developed for The nuit d'info
 * it helps you to create your own communication plateforme (web site)
 * 
 */
require_once("../modules/config.aidecom.php"); 
require_once("../modules/session.aidecom.php");
require_once("../modules/options.aidecom.php");
$new_session = new session;
$new_session->is_connected();
$get_info = new informations;
$options = new option;
if(isset($_GET['action'])){
    switch($_GET['action']){
        case "logout":
            $new_session->log_out();
            break;
        case "profil":
            header('Location: profil.php');
            break;
        case "settings":
            break;
        default:
            break;
    }
}
$new_session->redirect_session();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $name; ?> | Liste des élements</title>
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
                <?php include("inc/notifbar.aidecom.php"); ?>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="img/avatar5.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, <?php echo $get_info->get_element("first_name"); ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
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
 <div class="alert alert-info alert-dismissable">
                                        <i class="fa fa-info"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Informations </b> Selectioner un organisme et regarder ses informations
</div>
<!-- Main content -->
<section class="content">

<!-- Small boxes (Stat box) -->
<!-- /.row -->

                    <!-- top row -->
                    <div class="row">
                        <div class="col-xs-12 connectedSortable">
                             <?php
        switch($_GET['show']){
            case "organisme":
                $options->draw_tab();
                break;
            case "admin":
                if($get_info->get_element("grade") == "5"){
                    $options->draw_messages();
                }
                break;
            default:
                echo ' <div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-info"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>404 </b> Page introuvable
</div>';
                break;
        }
    ?>
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
                            <div class="box box-info">
                                <div class="box-header">
                                    <i class="fa fa-envelope"></i>
                                    <h3 class="box-title">Envoyer un Email</h3>
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                                    </div><!-- /. tools -->
                                </div>
                                <div class="box-body">
                                <?php 

                                /*
                                * code to liste 'organismes'
                                */
                                include("../modules/config.aidecom.php");
                                $maxRows_gsoc = 10;
                                $pageNum_gsoc = 0;
                                if (isset($_GET['pageNum_gsoc'])) {
                                    $pageNum_gsoc = $_GET['pageNum_gsoc'];
                                }
                                $startRow_gsoc = $pageNum_gsoc * $maxRows_gsoc;

                                mysql_select_db($database_busapp, $busapp);
                                $query_gsoc = "SELECT * FROM ". $db_prefix ."organismes";
                                $query_limit_gsoc = sprintf("%s LIMIT %d, %d", $query_gsoc, $startRow_gsoc, $maxRows_gsoc);
                                $gsoc = mysql_query($query_limit_gsoc, $busapp) or die(mysql_error());
                                $row_gsoc = mysql_fetch_assoc($gsoc);

                                if (isset($_GET['totalRows_gsoc'])) {
                                     $totalRows_gsoc = $_GET['totalRows_gsoc'];
                                } else {
                                $all_gsoc = mysql_query($query_gsoc);
                                $totalRows_gsoc = mysql_num_rows($all_gsoc);
                                }
                                $totalPages_gsoc = ceil($totalRows_gsoc/$maxRows_gsoc)-1;
                                 ?>
                                <div id="mail_form">
                                    <form  action="#" method="post">
                                        <div class="form-group">
                                            <label>Organisme</label>
                                            <select id ="select_organisme" class="form-control" onchange="draw_email(this)">
                                            <?php 
                                            do{
                                             ?>
                                                <option id="<?php echo $row_gsoc['id']; ?>"><?php echo $row_gsoc['name']; ?></option>
                                            <?php }while($row_gsoc = mysql_fetch_assoc($gsoc)); ?>
                                            </select>
                                        </div>
                                        <div id="email_orga" class="form-group">
                                            <input id="email_orga" type="email" class="form-control" name="emailto" placeholder="Email to:"/>
                                        </div>
                                        <div class="form-group">
                                            <input id="subject" type="text" class="form-control" name="subject" placeholder="Subject"/>
                                        </div>
                                        <div>
                                            <textarea id="dmessage" class="textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                        </div>
                                    </form>
                                </div>
                                <div id ="div_btn_send" class="box-footer clearfix">
                                    <button class="pull-right btn btn-default" id="sendEmail" onclick="send_mail(this)">Send <i class="fa fa-arrow-circle-right"></i></button>
                                </div>
                            </div>
                            </div>

                        </section><!-- /.Left col -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-lg-6 connectedSortable">
                            <!-- Map box -->
                            
                            <!-- Chat box -->
                            <?php include("chat.php"); ?>
                            <!-- /.box (chat box) -->

                            
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

        <script src="../../js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="../../js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    </body>
</html>