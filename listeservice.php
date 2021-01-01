<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
    



      
         <nav class="navbar navbar-inverse">
               <div class="container-fluid">
                     <div class="navbar-header">
                         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#Mynavbar">
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                         </button>
                          <a class="navbar-brand" href="#"><img class="login-img"  src="image/WorkStore.png" ></a>
                       
                     </div>
                        <div class="collapse navbar-collapse" id="Mynavbar">
                             <ul class="nav navbar-nav navbar-right">
                                 <li class=><a href="direhome.php" " style="color: white;">Accueil</a></li>
                                 <li ><a href="#" style="color: white;">cepelture</a></li>
                                 <li ><a href="#" style="color: white;">Guide</a></li>

                                 
                                 


                                
                             </ul>
                        </div>
               </div>
           
         </nav>

      
           </div>
         </div>


     
                  <div class="container">
              
                <div class="row">
                  <div class="col-sm-12">
                      <section class="panel">
                          
                          <table class="table">
                              <thead>
                              <tr>
                                  <th>Numero</th>
                                  <th>Nom</th>
                                  
                                  <th>Service</th>
                                  
                                  
                                  
                                  
                                  
                                  
                              </tr>
                              </thead>
                              <tbody>
                              <tr>

         <?php 
           include("base.php");
            $query=$bdd->query("SELECT * FROM service");
           while ($donnee=$query->fetch()) {   ?>
          
         
                                  <td><?php echo $donnee["id_service"]  ; ?></td>
                                  <td><?php echo  $donnee["libele_service"] ; ?></td>
                                    
                                   <td> <a href="suprimerservice.php?id=<?php echo $donnee["id_service"]?>"> <button class="btn btn-success">suprimer</button></a></td>
                              <td><a href="suprimerservice.php?id=<?php echo $donnee["id_service"]?>" > <button class="btn btn-success">editer</button></a></td>
                                 
                                  
                              </tr>
      <?php  }   ?>     
                              </tbody>
                          </table>
                      </section>
                  </div>

         </div>



         










    </body>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>
    
    <!-- Scrolling Nav JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/scrolling-nav.js"></script>








</html>