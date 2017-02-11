<?php

//etat pour enregistrer le client et la date pour la 1ere fois
$premiereFois=0;
include("securite/conexion.php");
session_start();

	 if(!isset($_SESSION['login']) or $_SESSION['login']==''){


		header("Location: ../index.php");
	}else{
		if(isset($_POST['sub'])){
			
			
              $_SESSION['client']=$_POST['client'];
			
			   $_SESSION['date']=$_POST['date'];
			   
			$idprod=$_POST['produit'];
			$type=$_POST['type'];
			if($_POST['type']==1 ){
				$type="Vente";
				
			}else if($_POST['type']==2 ){
				$type="Recharge";
				
				
			}else if($_POST['type']==3 ){
				$type="Entretien";
		
				
			}
			
			$Qte=$_POST['Qte'];
		$req12="select * from produits where id=$idprod";
		$rsz=mysql_query($req12) or die(mysql_error());
		$prod1=mysql_fetch_assoc($rsz);
			if($_POST['prix']!=''){
				$price=$_POST['prix'];
				
			}else{
				
				if($_POST['type']==1 ){
	
				$price=$prod1['pv'];
			}else if($_POST['type']==2 ){
	
				
				$price=$prod1['pr'];
				
			}else if($_POST['type']==3 ){
			
					$price=$prod1['pe'];
				
			}
		
		
		
				
			  
			}
			
			$reqDetail44="select * from detail_Boncmd where etat='0' and Id_Prod='$idprod' and type='$type'";
			$rsz144=mysql_query($reqDetail44) or die(mysql_error());
			$prod=mysql_fetch_assoc($rsz144);
			
	    if($Qte<=$prod1['qteDispo']){
		     if(isset($prod['Id_Prod'])){
			  $Qte+=$prod['Qte'];
			  $idpr=$prod['Id_Prod'];
			             $reqDetail="update detail_Boncmd set Qte='$Qte' where etat='0' and Id_Prod='$idpr'and type='$type' ";// 
			$rsz1=mysql_query($reqDetail) or die(mysql_error());
			
			
		           }else{
					   
					   		$reqDetail="insert into detail_Boncmd values('','0','$idprod','$Qte','	$price','0','$type')";
			$rsz1=mysql_query($reqDetail) or die(mysql_error());
					   
				   }
			
			
		
			
			
			  
		}
		}
		if(isset($_POST['suball'])){
			  $c= $_SESSION['client'];
			  $d= $_SESSION['date'];
			$req122="select * from clients where nom='$c'";
		$rsz22=mysql_query($req122) or die(mysql_error());
		$prod122=mysql_fetch_assoc($rsz22);
		$idcl=$prod122['id'];
		    $total="SELECT  sum(`prix` *  `Qte`) AS  'total'
FROM  `detail_Boncmd` where etat='0'
GROUP BY  NumBonCmd  ";
       	$rstotal=mysql_query($total) or die(mysql_error());
		$tot=mysql_fetch_assoc($rstotal);
		$toot=$tot['total'];
			$suball="insert into Boncmd values('','$d','$idcl','	$toot') ";
			mysql_query($suball);
			
			$reqNumCmd="select * from Boncmd  where date='$d' and idCl='$idcl' ORDER BY id DESC LIMIT 1";
			$rsreqNumCmd=mysql_query($reqNumCmd) or die(mysql_error());
			$reqNumfact=mysql_fetch_assoc($rsreqNumCmd);
			$numF=$reqNumfact['id'];
			$reqUpdateDetail="update detail_Boncmd set NumBonCmd='$numF',etat='1' where etat='0'";
			mysql_query($reqUpdateDetail) or die(mysql_error());
			unset( $_SESSION['client']);
				   unset( $_SESSION['date']);
			header("location:Boncmd.php?id=$numF");
			
		}
		
			$req="SELECT * FROM  `produits` ";
			$rs=mysql_query($req) or die(mysql_error());
			
			
			
			$req1="select * from clients";
			$rs1=mysql_query($req1) or die(mysql_error());
			$req3="select *from produits";
			$rs3=mysql_query($req3) or die(mysql_error());
			
				$req4="select * from detail_Boncmd where etat='0' ";
			$rs4=mysql_query($req4) or die(mysql_error());
			
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
<link href="js/plugins/chosen/chosen/chosen.css" rel="stylesheet">
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
	  <div class="box paint color_0">
            <div class="title">
              <h4> <i class="icon-random"></i> <span>Bon De Commande</span> </h4>
            </div>
            <div class="content ">
              <form class="form-horizontal" action="" method="post">
                 <div class="form-row control-group row-fluid">
                  <label class="control-label span1">Client</label>
                  <div class="controls span3">
                    <select data-placeholder="Choisir Client" name="client" class="chzn-select" required>
					<?php if(!isset($_SESSION['client'])){ ?>
                      <option value=""></option>
              
                        <?php while($Client=mysql_fetch_assoc($rs1)){  ?>
                      <option value="<?php echo $Client['nom']  ?>"><?php echo $Client['nom']  ?></option>
                      <?php } ?>
					  <?php }else{ ?>
					   <option value="<?php echo $_SESSION['client']; ?>"><?php echo $_SESSION['client']; ?></option>
					   <?php } ?>
                    </select>
                  </div>
                  
                  <label class="control-label span1">Date</label>
                  <div class="controls span3">
                    <input type="text" id="datepicker1" <?php if(!isset($_SESSION['client'])){ ?> value="" <?php  }else { ?>value="<?php echo $_SESSION['date'];?>" <?php  }?>  name="date" class="row-fluid" required>
                  </div>
				  <label class="control-label span1">Produit</label>
                  <div class="controls span3">
                    <select data-placeholder="Choisissez un Produit " name="produit" class="chzn-select" required>
                      <option value=""></option>
                     <?php while($prod=mysql_fetch_assoc($rs)){  ?>
                      <option value="<?php echo $prod['id']  ?>"><?php echo $prod['desi']  ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
		
                
         <div class="form-row control-group row-fluid">
                  
                   <label class="control-label span1" for="default-select">Service :</label>
                  <div class="controls span3">
				
		
                    <select onclick="submit1();" name="type" data-placeholder="Type De Service" class="chzn-select" id="default-select" required>
                      <option value=""></option>
                      <option value="1">Vente</option>
                      <option value="2">Recharge</option>
                      <option value="3">Entretien</option>
					  
                      
                    </select>
					
                  </div>
                  <label class="control-label span1" for="combined-input">Prix</label>
                  <div class="controls span3">
                    <div class="input-prepend input-append row-fluid"> <span class="add-on prepend ">dh</span>
                      <input class="row-fluid" id="combined-input" name="prix" size="16" type="text" value="">
                      <span class="add-on ">.00</span> </div>
                  </div>
				   <label class="control-label span1" for="combined-input">Quantite</label>
                  <div class="controls span3">
                    <div class="input-prepend input-append row-fluid"> 
                      <input class="row-fluid" id="combined-input" name="Qte" size="16" type="number" value="" required >
                    </div>
                  </div>
				  <br><br>
				   <div class="controls span4 offset8">
                  <button type="submit" name="sub" class="btn btn-large btn-block btn-success"  >AJOUTER ARTICLE</button>
                </div>
				 
				
                </div>
                 </form>
            </div>
          </div>
       
	  <div class="row-fluid">
        <div class="box ">
          <div class="title">
            <h4> <span>Aricles</span> </h4>
          </div>
          <!-- End .title -->
          
          <div class="content top">
            <table id="datatable_example" class="responsive table table-striped table-bordered" style="width:100%;margin-bottom:0; ">
              <thead>
                <tr>
                 
                 
                  <th class="to_hide_phone  no_sort">Designation</th>
                  <th class="to_hide_phone ue no_sort">Quantité</th>
                  <th class="">Prix Unitaire</th>
                  <th class="to_hide_phone span2">Total</th>
                 
                  <th class="ms no_sort ">Actions</th>
                </tr>
              </thead>
              <tbody>
                
                <?php while($detail=mysql_fetch_assoc($rs4)){ 
				$idpp=$detail['Id_Prod'];
                   $req123="select * from produits where id='$idpp'";
		$rsz12=mysql_query($req123) or die(mysql_error());
		$desi=mysql_fetch_assoc($rsz12);
		
				?>
                 <tr>
                  <td class="to_hide_phone">	<?php echo $detail['type']." de : ".$desi['desi']; ?>   </td>
                  <td class="to_hide_phone"><?php echo $detail['Qte']; ?></td>
                  <td><?php echo $detail['prix']; ?></td>
                  <td class="to_hide_phone"><?php echo $detail['Qte']*$detail['prix']; ?></td>
                
                  <td class="ms"><div class="btn-group">  <a class="btn  btn-small" rel="tooltip" data-placement="bottom" href="DeleteDetailBonCmd.php?id=<?php echo $detail['id']  ?>" data-original-title="Remove"><i class="gicon-remove "></i></a> </div></td>
				   </tr>
				<?php } ?>               
			
             
               
              </tbody>
            </table>
          </div>
		  <form action="" method="post">
		    <div class="form-actions row-fluid">
                  <div class="span12 offset8">
                    <button type="submit" name="suball"  class="btn btn-primary">Enregistrer la commande</button>
                   <a href="Unset.php"> <button type="button" class="btn btn-secondary">Annuler</button></a>
                  </div>
                </div>
				<f/orm>
          <!-- End .content --> 
        </div>
        <!-- End box --> 
      </div>
     
	
     </div>
    <!-- End #container --> 
  
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
<script language="javascript" type="text/javascript" src="js/plugins/chosen/chosen/chosen.jquery.min.js"></script> 

<!-- Data tables --> 

<script type="text/javascript" language="javascript" src="js/plugins/datatables/js/jquery.dataTables.js"></script> 
<script language="javascript" type="text/javascript" src="js/plugins/knockout-2.0.0.js"></script>

<!-- Custom made scripts for this template --> 
<script src="js/scripts.js" type="text/javascript"></script> 
<script type="text/javascript">
  /**** Specific JS for this page ****/
/* Todo Plugin */
function submit1(){
	
	document.getElementById("form1").submit();
}
 
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
      $.extend( $.fn.dataTableExt.oStdClasses, {
        "s`": "dataTables_wrapper form-inline"
      } );

       $(".chzn-select, .dataTables_length select").chosen({
                   disable_search_threshold: 10

        });
    });
        

  

  
    
 $(".chzn-select").chosen({
          disable_search_threshold: 5
        });
   $('#datepicker1').datepicker({
          format: 'mm-dd-yyyy'
        });



</script>
</body>
</html>
	<?php } ?>