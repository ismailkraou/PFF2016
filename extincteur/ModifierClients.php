<?php


include("securite/conexion.php");
session_start();

	 if(!isset($_SESSION['login']) or $_SESSION['login']==''){


	header("Location: ../index.php");
	}else{

		if(!isset($_GET['id'])){

			header("Location: AjouterClients.php");
		}
else {
	$id=$_GET['id'];
	if(isset($_POST['ok'])){


			$nom=$_POST['nom'];
			$tel=$_POST['tel'];

			  $req="update   `clients` set nom='$nom',tel='$tel' WHERE id=$id";
  mysql_query($req) or die(mysql_error());
		header("Location: AjouterClients.php");
	}
	$req1="select * from clients where id=$id";
    $rs1=mysql_query($req1) or die(mysql_error());


 $serv=mysql_fetch_assoc($rs1);
	}

?>
<!DOCTYPE html>
<html class="sidebar_default  no-js" lang="en">
<head>
<meta charset="utf-8">
<title>Administration Extincteurs</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="css/images/favicon.png">
<!-- Le styles -->
<link href="css/twitter/bootstrap.css" rel="stylesheet">
<link href="css/base.css" rel="stylesheet">
<link href="css/twitter/responsive.css" rel="stylesheet">
<link href="css/jquery-ui-1.8.23.custom.css" rel="stylesheet">
<script src="js/plugins/modernizr.custom.32549.js"></script>

</head>

<body>
<div id="loading"><img src="img/ajax-loader.gif"></div>
<div id="responsive_part">
  <div class="logo"> <a href="index.html"><span>Start</span><span class="icon"></span></a> </div>
  <ul class="nav responsive">
    <li>
      <button class="btn responsive_menu icon_item" data-toggle="collapse" data-target=".overview"> <i class="icon-reorder"></i> </button>
    </li>
  </ul>
</div>
<!-- Responsive part -->
<?php  include("sidebar.php")?>
<div id="main">
  <div class="container">
    <div class="header row-fluid">
      <div class="logo"> <a href="index.html"><span>Acceuil</span><span class="icon"></span></a> </div>
      <div class="top_right">
        <ul class="nav nav_menu">
          <li class="dropdown"> <a class="dropdown-toggle administrator" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
            <div class="title"><span class="name">Mr.Alaoui</span><span class="subtitle">Administrateur</span></div>
            <span class="icon"><img src="img/thumbnail_george.jpg"></span></a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">

              <li><a href="index2.html"><i class=" icon-unlock"></i>Se deconnecter</a></li>

            </ul>
          </li>
        </ul>
      </div>
      <!-- End top-right -->
    </div>
    <div id="main_container">
	 <div class="row-fluid">
	 <div class="box paint color_7">
            <div class="title">
              <h4> <i class="icon-eye-open"></i> <span>Modifiers Client</span> </h4>
            </div>

			<div class="content cursor ">
              <form class="form-horizontal" method="post" action="">
                <div class="form-row control-group row-fluid ">
                  <label class="control-label span1" for="mask-phone">Nom <span class="help-block"></span> </label>
                  <div class="controls span4">
                    <input id="mask-phone" type="text" tabindex="3" name="nom" value="<?php echo  $serv['nom'] ?>" placeholder="" class="row-fluid">
                  </div>
				   <label class="control-label span1" for="mask-phone">telephone <span class="help-block"></span> </label>
                  <div class="controls span4">
                    <input id="mask-phone" type="number" tabindex="3" name="tel"  placeholder="(06/05)-****-****" value="<?php echo  $serv['tel'] ?>" class="row-fluid">
                  </div>

                  <button type="submit" style="    margin-left: 1%;
    width: 13%;" class="btn btn-inverse btn-large" rel="tooltip" data-placement="top" name="ok" data-original-title="">Modifier</button>

                </div>



              </form>
            </div>

          </div>

				</div>
         <!-- End .content -->
        </div>
        <!-- End box -->
      </div>

     </div>
    <!-- End #container -->
  </div>
  <div id="footer">
    <p> &copy; Extincteurs-Incendie - 2015 </p>
    </div>
</div>
<div class="background_changer dropdown">
  <div class="dropdown" id="colors_pallete"> <a data-toggle="dropdown" data-target="drop4" class="change_color"></a>
    <ul  class="dropdown-menu pull-left" role="menu" aria-labelledby="drop4">
      <li><a data-color="color_0" class="color_0" tabindex="-1">1</a></li>
      <li><a data-color="color_1" class="color_1" tabindex="-1">1</a></li>
      <li><a data-color="color_2" class="color_2" tabindex="-1">2</a></li>
      <li><a data-color="color_3" class="color_3" tabindex="-1">3</a></li>
      <li><a data-color="color_4" class="color_4" tabindex="-1">4</a></li>
      <li><a data-color="color_5" class="color_5" tabindex="-1">5</a></li>
      <li><a data-color="color_6" class="color_6" tabindex="-1">6</a></li>
      <li><a data-color="color_7" class="color_7" tabindex="-1">7</a></li>
      <li><a data-color="color_8" class="color_8" tabindex="-1">8</a></li>
      <li><a data-color="color_9" class="color_9" tabindex="-1">9</a></li>
      <li><a data-color="color_10" class="color_10" tabindex="-1">10</a></li>
      <li><a data-color="color_11" class="color_11" tabindex="-1">10</a></li>
      <li><a data-color="color_12" class="color_12" tabindex="-1">12</a></li>
      <li><a data-color="color_13" class="color_13" tabindex="-1">13</a></li>
      <li><a data-color="color_14" class="color_14" tabindex="-1">14</a></li>
      <li><a data-color="color_15" class="color_15" tabindex="-1">15</a></li>
      <li><a data-color="color_16" class="color_16" tabindex="-1">16</a></li>
      <li><a data-color="color_17" class="color_17" tabindex="-1">17</a></li>
      <li><a data-color="color_18" class="color_18" tabindex="-1">18</a></li>
      <li><a data-color="color_19" class="color_19" tabindex="-1">19</a></li>
      <li><a data-color="color_20" class="color_20" tabindex="-1">20</a></li>
      <li><a data-color="color_21" class="color_21" tabindex="-1">21</a></li>
      <li><a data-color="color_22" class="color_22" tabindex="-1">22</a></li>
      <li><a data-color="color_23" class="color_23" tabindex="-1">23</a></li>
      <li><a data-color="color_24" class="color_24" tabindex="-1">24</a></li>
      <li><a data-color="color_25" class="color_25" tabindex="-1">25</a></li>
    </ul>
  </div>
</div>
<!-- End .background_changer -->
</div>
<!-- /container -->

<!-- Le javascript
    ================================================== -->
<!-- General scripts -->
<script src="js/jquery.js" type="text/javascript"> </script>
<!--[if !IE]> -->
<!--[if !IE]> -->
<script src="js/plugins/enquire.min.js" type="text/javascript"></script>
<!-- <![endif]-->
<!-- <![endif]-->
<!--[if lt IE 7]>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE7.js"></script>
<![endif]-->
<script language="javascript" type="text/javascript" src="js/plugins/jquery.sparkline.min.js"></script>
<script src="js/plugins/excanvas.compiled.js"></script>
<script src="js/bootstrap-transition.js" type="text/javascript"></script>
<script src="js/bootstrap-alert.js" type="text/javascript"></script>
<script src="js/bootstrap-modal.js" type="text/javascript"></script>
<script src="js/bootstrap-dropdown.js" type="text/javascript"></script>
<script src="js/bootstrap-scrollspy.js" type="text/javascript"></script>
<script src="js/bootstrap-tab.js" type="text/javascript"></script>
<script src="js/bootstrap-tooltip.js" type="text/javascript"></script>
<script src="js/bootstrap-popover.js" type="text/javascript"></script>
<script src="js/bootstrap-button.js" type="text/javascript"></script>
<script src="js/bootstrap-collapse.js" type="text/javascript"></script>
<script src="js/bootstrap-carousel.js" type="text/javascript"></script>
<script src="js/bootstrap-typeahead.js" type="text/javascript"></script>
<script src="js/bootstrap-affix.js" type="text/javascript"></script>
<script src="js/fileinput.jquery.js" type="text/javascript"></script>
<script src="js/jquery-ui-1.8.23.custom.min.js" type="text/javascript"></script>
<script src="js/jquery.touchdown.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script>
<script language="javascript" type="text/javascript" src="js/plugins/jquery.tinyscrollbar.min.js"></script>
<script language="javascript" type="text/javascript" src="js/jnavigate.jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="js/jquery.touchSwipe.min.js"></script>
<script language="javascript" type="text/javascript" src="js/plugins/jquery.peity.min.js"></script>
<script language="javascript" type="text/javascript" src="js/plugins/jquery.sparkline.min.js"></script>
<!-- Flot charts -->
<script language="javascript" type="text/javascript" src="js/plugins/flot/jquery.flot.js"></script>
<script language="javascript" type="text/javascript" src="js/plugins/flot/jquery.flot.resize.js"></script>

<!-- Data tables -->
<script type="text/javascript" language="javascript" src="js/plugins/datatables/js/jquery.dataTables.js"></script>

<!-- Task plugin -->
<script language="javascript" type="text/javascript" src="js/plugins/knockout-2.0.0.js"></script>

<!-- Custom made scripts for this template -->
<script src="js/scripts.js" type="text/javascript"></script>

<script type="text/javascript">
  /**** Specific JS for this page ****/
 $(document).ready(function () {

        $('textarea.autogrow').autogrow();
        var elem = $("#chars");
        $("#text").limiter(100, elem);
        // Mask plugin http://digitalbush.com/projects/masked-input-plugin/
        $("#mask-phone").mask("(999) 999-9999");
        $("#mask-date").mask("99-99-9999");
        $("#mask-int-phone").mask("+33 999 999 999");
        $("#mask-tax-id").mask("99-9999999");
        $("#mask-percent").mask("99%");
        // Editor plugin https://github.com/jhollingworth/bootstrap-wysihtml5/
        $('#editor1').wysihtml5({
          "image": false,
          "link": false
          });
        // Chosen select plugin
        $(".chzn-select").chosen({
          disable_search_threshold: 10
        });
        // Datepicker
        $('#datepicker1').datepicker({
          format: 'mm-dd-yyyy'
        });
        $('#datepicker2').datepicker();
        $('.colorpicker').colorpicker()
        $('#colorpicker3').colorpicker();
    });



</script>
</body>
</html>
<?php  } ?>
