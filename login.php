<?php session_start();?>
<?php 
require("connect.php");
if(isset($_SESSION['uname_agent_sen'])){
header('location:departement_choix.php');

}else{
}
?>
<?php
if(isset($_POST['submit']))
{  
extract($_POST);
$users=$db->prepare("select * from agent where uname_agent_daf=? and upass_agent_daf=? and code_departement ='SEN' ");
$users->execute(array($uname_agent_daf ,$upass_agent_daf));
$data=$users->fetch();
if($data['uname_agent_daf']==$uname_agent_daf and $data['upass_agent_daf']==$upass_agent_daf ){
$_SESSION['uname_agent_sen']=$data['uname_agent_daf'];
$_SESSION['mat_agent_sen']=$data['mat_agent'];
$_SESSION['nom_agent_sen']=$data['nom_agent'];
$_SESSION['postnom_agent_sen']=$data['postnom_agent'];
$_SESSION['prenom_agent_sen']=$data['prenom_agent'];
header("location:departement_choix.php");
}
else
{
$messages= "Mauvais identifiant  ";
}

}
?>

<!DOCTYPE html>
<html lang="tr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

   <link href="css8/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css8/font-awesome.min.css">
	<link href="css8/animate.min.css" rel="stylesheet">
         
	<link href="css8/main.css" rel="stylesheet">
	 <link href="css8/responsive.css" rel="stylesheet">
	 <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       

	 <link href="animate.css" rel="stylesheet">

   <title >GESTION ET ARCHIVAGE DES COURRIERS</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

<header id="header">
        <nav class="navbar navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                      <span style="color:white"> Menu</span>
						  <a class="navbar-brand" style="color:white" href=""></a>
                    </button>
                  
                </div>
				
                <div class="collapse navbar-collapse navbar-left">
                    <ul class="nav navbar-nav">
  <li ><a href="/PNMLS"/  style="font-size:22px"> <img src="img3/acc.jpg"  style="height:35px;width:150%;margin-top:-23px;position:absolute" alt=""     /></a>
	&nbsp	&nbsp 	&nbsp
	<a href="/PNMLS"/ style="font-size:22px">Accueil</a></li>
                     
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
		
    </header><!--/header--></br></br></br></br></br></br>

    <style>
    html, body {
      height: 100%;
}
    body {
      background-image: url(img3/blancolor.PNG);
      background-size: auto;
      background-position: center;
   
}
    @font-face {
      font-family: workSans;
      src: url(font3/WorkSans-ExtraLight.ttf);
    }
    ul li a {
      font-size: 17px;
      font-family: "workSans";
      color: rgb(255, 255, 255);
      font-weight: bold;  
    }
    
    ul li a:hover {
      color: #443020;
    }
    
    .form-row button { 
      font-size: 17px;  
      font-family: "workSans";
      font-weight: bold;
    }
    
    h1, p, input {
      font-family: 'workSans';
    }
    input {
      font-weight: bold;
    } 
	
  </style>



        
  </head>
<body>
<div>
 <img src="img3/logo.png"  style="width:1200px;height:115px;width:50%;margin-top:-50px;margin-left:400px;" alt="" />
 </div></br></br></br>
    <div class="container-fluid">
 
    </div>
      <div class="container h-100">
  <div class="row h-100 justify-content-center align-items-center" style="margin-top:-80px;" >
  
  
    <form action=""   method="post" enctype="multipart/form-data" name="" > </br>
       <ul class="justify-content-end">


</ul><div align="center" >

     <div  class="text-center" style="background-color: #00BFFF;border-radius:6px;height:70px;width:50%;margin-left:80px" > </br>
     <b style="color:white;font-size:25px;">AUTHENTIFICATION</b>
     </div></br>
   </div>
    <div class="container h-100">
  <div class="row h-100 justify-content-center align-items-center">
    <form action="" method="post" >
    
     <div class="text-center" style="margin-bottom: 5em; color: #00BFFF;font-weight:bold;">
     <b style="color:red;"> </br> 
    <?php 
    
    if(isset($messages)){
        echo $messages;
        } 
        
    
    if(isset($message)){
        echo $message;
        }

        ?>
           </b>
     </div>
     <div  style="margin-top:-40px;margin-left:450px"  class="animated slideInLeft"  >

     <div class="form-row justify-content-center" >
       <div class="col-5" >
              <label style="color:#00BFFF;font-size:22px;">Nom d'utilisateur </label></br>
           <input type="text" name="uname_agent_daf"  class="form-control" id="formGroupExampleInput" placeholder="nom d'utilisateur" required style="border-color:silver;width:50%">
       </div> </br> 
       <div class="col-7 my-1">
                  <label style="color:#00BFFF;font-size:22px;">Mot de Passe</label></br>

           <input type="password" name="upass_agent_daf" class="form-control" id="formGroupExampleInput" placeholder="Mot de Passe" required style="border-color:silver;width:50%">
      </div></br> 
      <div class="form-row justify-content-center">
         <div class="col-7  my-1">
             <button type="submit" name="submit" class="btn btn-info btn-block" style="background-color: #00BFFF; color: #fff;font-size:23px;width:50%;font-family:verdana">Se Connecter</button>
         </div>
      </div>
     </div> </br></br>

    </form>   
  </div>
</div>
   

    <div  align="right" > 


 <img src="img3/pp.jpg"  style="height:60px;width:15%;margin-top:12px;margin-left:-60px;position:absolute" alt="" />
    </div> </div>
  </body>


    <script src="Menu/assets/plugins/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP CORE SCRIPT   -->
    <script src="Menu/assets/plugins/bootstrap.min.js"></script>  
    <!-- CUSTOM SCRIPTS -->
    <script src="Menu/assets/js/custom.js"></script>
</html>
