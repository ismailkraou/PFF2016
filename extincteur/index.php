<?php

include("securite/conexion.php");
if(isset($_POST['submit'])){
  session_start();
$user=$_POST['user'];
$pass=$_POST['pass'];
$user=md5($user);
$pass=md5($pass);
$req="select * from user where user='$user' and pass='$pass' ";
$rs=mysql_query($req);
$data=mysql_fetch_assoc($rs);
if($data['user']==null) echo '<div class="col-sm-6 col-lg-12">
    <!-- Danger Alert -->
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        
        <p>Opps,Votre Nom  d utilisateur ou votre mot de pass Est incorrecte !!  </p>
    </div>
    <!-- END Danger Alert -->
</div>';
    else{
            $_SESSION['login']=$user;




		header("Location: pan.php");
	    }
}
?>
<!DOCTYPE html>

<html class="no-js login" lang="en">
<head>
<meta charset="utf-8">
<title>Start Login - Admin Template</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="css/images/favicon.png">
<!-- Le styles -->
<link href="css/twitter/bootstrap.css" rel="stylesheet">
<link href="css/base.css" rel="stylesheet">
<link href="css/twitter/responsive.css" rel="stylesheet">
<link href="css/jquery-ui-1.8.23.custom.css" rel="stylesheet">
<script src="js/plugins/modernizr.custom.32549.js"></script>
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->

</head>

<body>
<div id="login_page"> 
  <!-- Login page -->
  <div id="login">
    <div class="row-fluid fluid">
      <div class="span2">  </div>
      <div class="span12">
         <div class="box paint color_3">
            <div class="title">
              <h4> <i class="icon-calendar"></i> <span>Connection</span> </h4>
            </div>
            <div class="content ">
              <form class="bs-docs-example form-horizontal" method="post" action="">
               
                <div class="control-group row-fluid">
                  <label class="control-label span3" for="inputPassword">User</label>
                  <div class="controls span9 input-append">
                    <input type="text" id="inputUsername" name="user" placeholder="Nom D'utilisateur"  class="row-fluid">
                    <span class="add-on"><i class="icon-user"></i></span> </div>
                </div>
                <div class="control-group row-fluid">
                  <label class="control-label span3"  for="inputPassword">Password</label>
                  <div class="controls span9 input-append">
                    <input type="password" id="inputPassword"name="pass" placeholder="Mot de Pass" class="row-fluid">
                    <span class="add-on"><i class="icon-lock"></i></span> </div>
                </div>
               
                <div class="control-group row-fluid">
                 <div class="span3 visible-desktop"></div>
                  <div class="controls span5">
                    <button type="submit" name="submit" class="btn btn-primary">Se connecter</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
         
      </div>
    </div>
  </div>
  <!-- End #login --> 
  <!-- <img src="img/ajax-loader.gif"> --> 
</div>
<!-- End #loading --> 

<!-- Le javascript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 

<!-- Flip effect on login screen --> 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script> 
<script type="text/javascript" src="js/plugins/jquerypp.custom.js"></script> 
<script type="text/javascript" src="js/plugins/jquery.bookblock.js"></script> 
<script language="javascript" type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script> 
<script type="text/javascript">
      $(function() {
        var Page = (function() {

          var config = {
              $bookBlock: $( '#bb-bookblock' ),
              $navNext  : $( '#bb-nav-next' ),
              $navPrev  : $( '#bb-nav-prev' ),
              $navJump  : $( '#bb-nav-jump' ),
              bb        : $( '#bb-bookblock' ).bookblock( {
                speed       : 800,
                shadowSides : 0.8,
                shadowFlip  : 0.7
              } )
            },
            init = function() {

              initEvents();
              
            },
            initEvents = function() {

              var $slides = config.$bookBlock.children(),
                  totalSlides = $slides.length;

              // add navigation events
              config.$navNext.on( 'click', function() {
              $("#arrow_register").fadeOut();
              $(".not-member").slideUp();
              $(".already-member").slideDown();
                config.bb.next();
                return false;

              } );

              config.$navPrev.on( 'click', function() {

                 $(".not-member").slideDown();
                $(".already-member").slideUp();
                config.bb.prev();
                return false;

              } );

              config.$navJump.on( 'click', function() {
                
                config.bb.jump( totalSlides );
                return false;

              } );
              
              // add swipe events
              $slides.on( {

                'swipeleft'   : function( event ) {
                
                  config.bb.next();
                  return false;

                },
                'swiperight'  : function( event ) {
                
                  config.bb.prev();
                  return false;
                  
                }

              } );

            };

            return { init : init };

        })();

        Page.init();

      });
    </script> 
<script type='text/javascript'>
 
    $(window).load(function() {
     $('#loading1').fadeOut();
    });
      $(document).ready(function() {
           $("input:checkbox, input:radio, input:file").uniform();


      $('[rel=tooltip]').tooltip();
      $('body').css('display', 'none');
      $('body').fadeIn(500);

      $("#logo a, #sidebar_menu a:not(.accordion-toggle), a.ajx").click(function() {
        event.preventDefault();
        newLocation = this.href;
        $('body').fadeOut(500, newpage);
        });
        function newpage() {
        window.location = newLocation;
        }
      });
      
    

    </script>
</body>
</html>
