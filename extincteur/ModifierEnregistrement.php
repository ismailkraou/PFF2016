<?php


include("securite/conexion.php");
session_start();

	 if(!isset($_SESSION['login']) or $_SESSION['login']==''){


	header("Location: ../index.php");
	}else{

		if(!isset($_GET['id'])){

			header("Location: HistoriqueEnregisrement.php");
		}
else {
	$id=$_GET['id'];
	if(isset($_POST['ok'])){

		$matricule=$_POST['Matricule'];
		$Km1=$_POST['Km1'];
		$Km2=$_POST['Km2'];
		$Distance=$Km2-$Km1;
		$time = strtotime($_POST['date']);

	$Date = date("Y-m-d",$time);
	//	$Date=$_POST['date'];

		$req="update   `voiture` set Distance =$Distance,
	km2=$Km2 where id=$id";
	mysql_query($req) or die(mysql_error());


		header("Location: HistoriqueEnregisrement.php");
	}
	$req1="select * from voiture where id=$id";
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
  <div class="logo"> <a href="pan.php"><span>Start</span><span class="icon"></span></a> </div>
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
      <div class="logo"> <a href="pan.php"><span>Acceuil</span><span class="icon"></span></a> </div>
      <div class="top_right">
        <ul class="nav nav_menu">
          <li class="dropdown"> <a class="dropdown-toggle administrator" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
            <div class="title"><span class="name">Mr.Alaoui</span><span class="subtitle">Administrateur</span></div>
            <span class="icon"><img src="img/thumbnail_george.jpg"></span></a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">

              <li><a href="deconnexion.php"><i class=" icon-unlock"></i>Se deconnecter</a></li>

            </ul>
          </li>
        </ul>
      </div>
      <!-- End top-right -->
    </div>
    <div id="main_container">
		<div class="box paint color_2">
	             <div class="title">
	               <h4> <i class="icon-calendar"></i> <span>Nouveau Eregistrement de Voiture</span> </h4>
	             </div>
	             <div class="content ">
	              <form name="formIns" class="form-horizontal" action='' method="POST">
	   <fieldset>


			 <div class="form-row control-group row-fluid">
								 <label class="control-label span3" for="default-select">Matricule :<?php echo $serv['matricule']?></label>
								 <div class="controls span3">

									 <input type="text" id="datepick" name="Matricule" value="<?php echo $serv['matricule'] ?>" class="row-fluid" disabled="">
								 </div>
							 </div>
							 <div class="form-row control-group row-fluid">
								 <label class="control-label span3">Date Depart</label>
								 <div class="controls span3">
									 <input type="text" id="datepicker1" name="date" disabled value="<?php echo $serv['date'] ?>" class="row-fluid">
								 </div>
							 </div>
	     <div class="control-group row-fluid">
	       <!-- Email -->
	       <label class="control-label span3"  for="Email">Km De Depart</label>
	       <div class="controls span3">
	         <input type="number" id="email" value="<?php echo $serv['Km1'] ?>"  name="Km1" placeholder="" class="row-fluid">

	       </div>
	     </div>
			 <div class="control-group row-fluid">
				<!-- Username -->
				<label class="control-label span3"  for="username">KM De retour</label>
				<div class="controls span3">
					<input type="number" id="username" value="<?php echo $serv['Km2'] ?>" name="Km2"   onblur="verifkm()" placeholder="" class="row-fluid">

				</div>
			</div>
   <div class="control-group row-fluid">
	   <div class="span3 visible-desktop"></div>
	                   <div class="controls span3">
	                     <button type="submit" name="ok" class="btn btn-primary">Enregistrer</button>
	                   </div>
	                 </div>



	   </fieldset>
	 </form>
	             </div>
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
<script language="javascript" type="text/javascript" src="js/plugins/bootstrap-datepicker.js"></script>
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
  // Datatables
    $(document).ready(function() {

      var dontSort = [];
                $('#datatable_example thead th').each( function () {
                    if ( $(this).hasClass( 'no_sort' )) {
                        dontSort.push( { "bSortable": false } );
                    } else {
                        dontSort.push( null );
                    }
      } );
      $('#datatable_example').dataTable( {
        "sDom": "<'row-fluid table_top_bar'<'span12'<'to_hide_phone' f>>>t<'row-fluid control-group full top' <'span4 to_hide_tablet'l><'span8 pagination'p>>",
         "aaSorting": [[ 1, "asc" ]],
        "bPaginate": true,

        "sPaginationType": "full_numbers",
        "bJQueryUI": false,
        "aoColumns": dontSort,

      } );
			$('#datepicker1').datepicker({
				 format: 'mm-dd-yyyy'
			 });
      $.extend( $.fn.dataTableExt.oStdClasses, {
        "s`": "dataTables_wrapper form-inline"
      } );

       $(".chzn-select, .dataTables_length select").chosen({
                   disable_search_threshold: 10

        });
    });
		function verifkm(){

			var km1=document.formIns.Km1.value;
			var km2=document.formIns.Km2.value;
			if(km2>km1){

		        return true;

		    }
		    else {
		         window.alert("Erreur de Saisie Dans KM De retour");

		        return false;
					}



		}


</script>
</body>
</html>
	<?php } ?>