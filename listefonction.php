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
                                  
                                  <th>fonction</th>
                                  
                                  
                                  
                                  
                                  
                                  
                              </tr>
                              </thead>
                              <tbody>
                              <tr>

         <?php 
           include("base.php");
            $query=$bdd->query("SELECT * FROM fonction");
           while ($donnee=$query->fetch()) {   ?>
          
         
                                  <td><?php echo $donnee["id_fonction"]  ; ?></td>
                                  <td><?php echo  $donnee["nom_fonction"] ; ?></td>
                                    
                                   <td> <a href="suprimerfonction.php?id=<?php echo $donnee["id_fonction"]?>"> <button class="btn btn-success">suprimer</button></a></td>
                              <td><a href="suprimerfonction.php?id=<?php echo $donnee["id_fonction"]?>" > <button class="btn btn-success">editer</button></a></td>
                                 
                                  
                              </tr>
      <?php  }   ?>     
                              </tbody>
                          </table>
                      </section>
                  </div>

         </div>

