<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
         
        //récupération des données stockées par le serveur Web dans le tableau associatif $_POST
        $leLogin = htmlspecialchars($_POST['txtLogin']);
      
      
        //obliger l'utilisateur à saisir login
        $loginOk = true;
      
        $rempli=true; 
        if (empty($leLogin)==true) {
            echo 'Le login n\'a pas été saisi<br/>';
            $rempli=false;
        }
      
        
        //si le login contient quelque chose
        // on continue les vérifications
        if ($rempli){
            //supprimer les espaces avant/après saisie
           
            $leLogin = trim($leLogin);
            
        

            //le login ne doit contenir que des lettres, pas des chiffres
            
            $patternLogin='#[a-zA-Z]+$#';
            if (preg_match($patternLogin, $leLogin)==false){
                echo 'Le login ne doit contenir que des lettres<br/>';
                $loginOk=false;
            }
          
           
              
        }
        if($rempli && $loginOk ){
                echo 'tout est ok, nous allons pouvoir créer votre compte...';
            }
        ?>
    </body>
</html>
