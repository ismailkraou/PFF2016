<?php

include("securite/conexion.php");
$pass=$_POST['pass'];
echo $pass;
if(isset($_POST['submit'])){
  session_start();

$pass=$_POST['pass'];
echo $pass;
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