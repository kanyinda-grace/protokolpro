<?php 
require("connect.php");
?>
<!DOCTYPE html>
<html lang="tr">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

<title >Gestion des courriers et Archivage</title>  

<H1></H1>

<script type="text/javascript" src="jquery-1.8.2.js"></script>
<script type="text/javascript" src="bootstrap.js"></script>
<script type="text/javascript" src="bootstrap-button.js"></script>
<script type="text/javascript" src="ag/pages.js"></script>        
<script type="text/javascript" src="menu.js"></script>
<link href="bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" />



     <link href="Menu/assets/css/bootstrap.css" rel="stylesheet" />
    <link href="Menu/assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="Menu/assets/css/style.css" rel="stylesheet" />



   <link href="css3/bootstrap.min.css" rel="stylesheet">

   		<script language="javascript" type="text/javascript">
        function printDiv(divID) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = 
              "<html><head><title></title></head><body>" + 
              divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;

          
        }
		</script>

</head>
  <style>
    html, body {
      height: 100%;
}
    body {
      background-color:white;
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


<div style=" background-color: #ffffff;" class="table-bordered"    >
 
 
	<div align="center">
 <a href="rapport.php"><img src="img3/logo.png"  style="width:100px;height:120px;width:50%;margin-top:-10px" alt="" /></a>
 </div>
 

 
<div style="width:100%; margin:5px;" align="right" > 

</div>



<div class="add" ><a style="color:white;font-size:20px;" onclick="javascript:printDiv('printablediv')" style="color:white;font-size:15px;background-color:red" name="print" style="cursor:pointer;" class="btn btn-info"><i class="icon-white icon-print"  ></i> Imprimer</a></div>
	</div>
<div id="container" class="table-responsive"  >
	<table border='2'   >
    </table>
      <div class="pagination"></div>
</div>  

       
    	
<div>
<label style="color: #0000ff;"></label> 
</div>

</div>



</body>
</html>