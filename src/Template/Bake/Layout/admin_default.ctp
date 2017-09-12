<?php $user = CakeSession::read("Auth.User"); //pr($this->request->params);exit;
//header('Content-Type: text/html; charset=ISO-8859-15');
//echo $this->webroot;exit;
if( ! ini_get('date.timezone') )
{
    date_default_timezone_set('GMT');
}

/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$cakeDescription = __d('cake_dev', 'Admin Panel');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $cakeDescription ?> : <?php echo $title_for_layout; ?></title>
	<?php
		/*echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');*/
		$this->Html->script('http://maps.google.com/maps/api/js?sensor=true', false);
        echo $this->Html->meta('favicon.ico','img/favicon.ico',array('type' => 'icon'));
	/*	echo $this->Html->meta($setting['Setting']['favicon'],$sitefilesPath.$setting['Setting']['favicon'],array('type' => 'icon'));*/
	?>
    <script src="<?php echo $this->webroot; ?>assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo $this->webroot; ?>assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/plugins/jquery-validation/dist/additional-methods.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->webroot; ?>assets/plugins/jquery.bootstrap-growl.min.js"></script>


    <meta charset="utf-8"/>
    <title>Admin Panel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <meta name="MobileOptimized" content="320">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="<?php echo $this->webroot; ?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $this->webroot; ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $this->webroot; ?>assets/plugins/bootstrap-switch/static/stylesheets/bootstrap-switch-metro.css"/>

    <link href="<?php echo $this->webroot; ?>assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $this->webroot; ?>assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
    <link href="<?php echo $this->webroot; ?>assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
    
    <link href="<?php echo $this->webroot; ?>assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet" type="text/css"/>
    
    <link href="<?php echo $this->webroot; ?>assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css"/>
    
    <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>assets/plugins/bootstrap-datepicker/css/datepicker.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>assets/plugins/bootstrap-timepicker/compiled/timepicker.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>assets/plugins/bootstrap-colorpicker/css/colorpicker.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>assets/plugins/bootstrap-datetimepicker/css/datetimepicker.css"/>
    <!-- END PAGE LEVEL PLUGIN STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="<?php echo $this->webroot; ?>assets/plugins/select2/select2_metro.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $this->webroot; ?>assets/plugins/data-tables/DT_bootstrap.css"/>
    <link rel="stylesheet" href="<?php echo $this->webroot; ?>assets/plugins/fancybox/source/jquery.fancybox.css" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>assets/plugins/jquery-multi-select/css/multi-select.css"/>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME STYLES -->
    <link href="<?php echo $this->webroot; ?>assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $this->webroot; ?>assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $this->webroot; ?>assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $this->webroot; ?>assets/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $this->webroot; ?>assets/css/pages/tasks.css" rel="stylesheet" type="text/css"/>
   <!-- <link href="<?php echo $this->webroot; ?>assets/css/themes/light.css" rel="stylesheet" type="text/css" id="style_color"/> -->
   <link href="<?php echo $this->webroot; ?>assets/css/themes/light.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="<?php echo $this->webroot; ?>assets/css/custom.css" rel="stylesheet" type="text/css"/>
    <!--<link href="<?php echo $this->webroot; ?>css/normalize.css" rel="stylesheet" type="text/css"/>
     END THEME STYLES -->
    <!-- Bootstrap modal css files for advanced search-->
    <?php //if($this->request->params['controller']=='projects' && $this->request->params['action']=='admin_index'){?>
  <!--  <link href="<?php echo $this->webroot; ?>assets/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css"/> -->
    <link href="<?php echo $this->webroot; ?>assets/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $this->webroot; ?>assets/css/pages/news.css" rel="stylesheet" type="text/css"/>
    <?php //} ?>
     <link rel="shortcut icon" href="favicon.ico"/>
  
    <script type="text/javascript">
    $("#hidelink").blur(function() {
        $("#divtoHide").hide();
        //$(".cake-sql-log tr:even").css("background-color", "#CCC");
        
    });
    </script>
    <style>
    .header .navbar-brand img{
        margin-left: 0px !important;
    }
    .form-actions.fluid > [class^="col-"]{padding-left: 6px !important}
    .pace .pace-progress {
      background: #29d;
      position: fixed;
      z-index: 2000;
      top: 0;
      left: 0;
      height: 2px;
      -webkit-transition: width 1s;
      -moz-transition: width 1s;
      -o-transition: width 1s;
      transition: width 1s;
    }
    .pace-inactive {
      display: none;
    }
    .header .navbar-brand { margin-top:-15px !important; }
    td{font-size: 13px !important;}
    </style>
    <script>(function (a, c, b, e) {
    a[b] = a[b] || {}; a[b].initial = { accountCode: "ITGTE11111", host: "ITGTE11111.pcapredict.com" };
    a[b].on = a[b].on || function () { (a[b].onq = a[b].onq || []).push(arguments) }; var d = c.createElement("script");
    d.async = !0; d.src = e; c = c.getElementsByTagName("script")[0]; c.parentNode.insertBefore(d, c)
})(window, document, "pca", "//ITGTE11111.pcapredict.com/js/sensor.js");</script>
</head>
<body class="page-header-fixed">

<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse navbar-fixed-top">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="header-inner">
        <!-- BEGIN LOGO -->
        <a class="navbar-brand" href="<?php echo $this->webroot; ?>adminmodule/pages/dashboard"  >
       	<img src="<?php echo $this->webroot; ?>assets/img/logo-small.png" alt="logo" class="img-responsive" />

        </a>
        <!-- <div class="sidebar-toggler hidden-phone">
        </div> -->
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <img src="<?php echo $this->webroot; ?>assets/img/menu-toggler.png" alt=""/>
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <ul class="nav navbar-nav pull-right">
           
            <li class="dropdown user">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <?php if($user['image'] != ''){?>
                        <img width="29" height="29" alt="" src="<?php echo $this->webroot; ?>uploads/adminavatars/<?php echo  $user['image'];?>"/>
                    <?php } else { ?>
                        <img alt="" width="29" height="29" src="<?php echo $this->webroot; ?>assets/img/avatar.png"/>
                    <?php } ?>
                <span class="username">
                    <?php echo $user['firstname']; ?> <?php echo $user['lastname']; ?>
                </span>
                <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?php echo $this->webroot; ?>adminmodule/users/profile"><i class="fa fa-user"></i> My Profile</a>
                    </li>
                    <li>
                        <a href="<?php echo $this->webroot; ?>adminmodule/users/logout"><i class="fa fa-key"></i> Logout</a>
                    </li>
                </ul>
            </li>
            <!-- END USER LOGIN DROPDOWN -->
        </ul>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper" style="background-color:#ccc;">
        <div class="page-sidebar navbar-collapse collapse">
            <!-- BEGIN SIDEBAR MENU -->
             <?php /*if(!empty($user) && $user['group_id']=='1'){ */
                      // echo $this->element('admin-sidebarleft'); 
                   /* }*/
                   echo $this->element('admin-sidebarleft'); 
             ?>              
            </ul>
            
            <!-- END SIDEBAR MENU -->
        </div>
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">

            <!-- BEGIN PAGE HEADER-->
            <div class="row" style="height:60px !important">

                <div class="col-md-12" style="height:60px !important">
                    <?php if($this->request->params['controller']=='dashboard'){?>
                    <h3 class="page-title">
                    Dashboard <small>statistics and more</small>
                  <!--  Demo Dashboard <small>just some demo content</small> -->
                    </h3>
                    <?php } ?> 
                    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                    <ul class="page-breadcrumb breadcrumb">
                        <li><i class="fa fa-home"></i><?php echo $this->Html->getCrumbs(' > ',array(
    'url' => array('controller' => 'pages/dashboard', 'action' => 'index'),
    'escape' => false)); ?></li>
                    </ul>
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN DASHBOARD STATS -->
               <?php echo $this->fetch('content'); ?>
            <!-- END DASHBOARD STATS -->
            <div class="clearfix">
            </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT -->
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="footer">
    <div class="footer-inner">
         2016 &copy; The House Crowd Admin Panel.
    </div>
    <div class="footer-tools">
        <span class="go-top">
            <i class="fa fa-angle-up"></i>
        </span>
    </div>
    <?php echo $this->element('sql_dump'); ?>
</div>


<!-- END FOOTER -->

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?php //echo $this->webroot; ?>assets/plugins/respond.min.js"></script>
<script src="<?php //echo $this->webroot; ?>assets/plugins/excanvas.min.js"></script> 
<![endif]-->

<script src="<?php echo $this->webroot; ?>assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo $this->webroot; ?>assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/plugins/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/plugins/data-tables/DT_bootstrap.js"></script>
<?php /*?><script type="text/javascript" src="<?php echo $this->webroot; ?>assets/plugins/flowplayer/flowplayer.min.js"></script><?php */?>
<!-- END PAGE LEVEL PLUGINS -->
<!--<script src="<?php echo $this->webroot;?>js/colorbox/jquery.colorbox.js"></script>-->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<?php /*?><script src="<?php echo $this->webroot; ?>assets/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script><?php */?>
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/plugins/jquery.pulsate.min.js" ></script>
<script src="<?php echo $this->webroot; ?>assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
<?php /*?><script src="<?php echo $this->webroot; ?>assets/plugins/jquery.sparkline.min.js" type="text/javascript"></script><?php */?>
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/plugins/jquery-multi-select/js/jquery.quicksearch.js"></script>

<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/plugins/clockface/js/clockface.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/plugins/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>



<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/plugins/fancybox/source/jquery.fancybox.pack.js"></script>

<?php /*?><script src="<?php echo $this->webroot; ?>assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script><?php */?>
<script src="<?php echo $this->webroot; ?>assets/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
<?php /*?><script src="<?php echo $this->webroot; ?>assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/plugins/jquery.sparkline.min.js" type="text/javascript"></script><?php */?>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo $this->webroot; ?>assets/scripts/app.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/scripts/jquery.validate.custom.rules.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/scripts/index.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/scripts/tasks.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
<?php /*?><script src="<?php echo $this->webroot; ?>assets/scripts/form-components.js"></script>
<script src="<?php echo $this->webroot; ?>assets/scripts/form-validation.js"></scrip

<?php */?>
<?php /*?><script src="<?php echo $this->webroot; ?>assets/scripts/table-managed.js"></script>
<script src="<?php echo $this->webroot; ?>assets/scripts/table-advanced.js"></script><?php */?>

<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/plugins/jquery-mixitup/jquery.mixitup.min.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
<script src="<?php echo $this->webroot; ?>assets/scripts/portfolio.js"></script>
<script src="<?php echo $this->webroot; ?>assets/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>assets/plugins/jquery.input-ip-address-control-1.0.min.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script src="<?php echo $this->webroot; ?>assets/scripts/app.js"></script>
<script src="<?php echo $this->webroot; ?>assets/scripts/form-components.js"></script>

<script src="<?php echo $this->webroot; ?>assets/scripts/ui-extended-modals.js"></script>
<script src="<?php echo $this->webroot; ?>assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>assets/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript"></script>
<?php //}?>

<script>
jQuery(document).ready(function() { 

   App.init(); // initlayout and core plugins
   Index.init();
   FormComponents.init();
   //Portfolio.init();

   //accreditation status for users
   $('#accreditation').change(function() {
        $("#accreditation").submit();
   });

        
});


</script>

		


<!-- END JAVASCRIPTS -->
	</div>
</body>
</html>