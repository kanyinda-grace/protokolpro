<?php
include("base.php");

  if (isset($_POST['sub'])) {
       
      if (isset($_POST['sub'])) {
  extract($_POST);
  
            
       
                          
            

            $ps=$bdd->prepare("INSERT INTO type_piece_jointe(libele_piece_jointe) VALUES (?)") or die("erreur du requette");
            $param=array($libele_piece_jointe) or die("erreur de param");
            $ps->execute($param) or die("erreur ds execute");
            echo "tout est okay"; 
                       

            

            }

           
  

  }



 ?>

 <!DOCTYPE html>
 <html>
 <head>
     <title></title>
     <meta charset="utf-8">
 </head>
 <body>
 
 </body>
 </html>






 <form method="POST" action="" >
  <br><label>type de piece : </label>
                <select name="libele_piece_jointe">
                  
                    
          <option value = "carte_electeur">carte d'electeur</option>
          <option value = "carte_etudiant">carte d'etudiant</option>
          <option value = "carte_permis_conduire">carte de permis de conduire</option>
          <option value = "carte_eleve">carte d'eleve</option>
                       
                
                 
                       
                       
                </select><br><br><br>
               
                
                
             <br><br><button style="background: darkblue;" type="submit" name="sub">Enregistrer</button>
             <button style="background:green;margin-left:0px;"><a style="text-decoration:none;color:#ffffff" href="#">ID existant</a></button>
            </form>