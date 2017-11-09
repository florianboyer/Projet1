<?php include ('haut.php');?>


<form action="" method="post">
<?php
 if(isset($_REQUEST['signup']))
 {
//On verifie que le formulaire a ete envoye
    if(isset($_POST['nom'], $_POST['prenom'], $_POST['identifiant'], $_POST['password'], $_POST['password2'], $_POST['email'], $_POST['tel'], $_POST['typeUser'])){
    
    // Vérification de l'identité des pwd
    if($_POST['password']==$_POST['password2']) {
        // vérification de la longueur du mot de passe
        if(strlen($_POST['password'])>=6) {
                // echappement des variables pour pouvoir les mettre dans une requette SQL
                $username = $cnx->escape_string($_POST['identifiant']);
                $password = $cnx->escape_string($_POST['password']);
                $password = password_hash($password, PASSWORD_DEFAULT);
                $email = $cnx->escape_string($_POST['email']);
                $tel = $cnx->escape_string($_POST['tel']);
                $typeUser = $cnx->escape_string($_POST['typeUser']);
                $nom = $cnx->escape_string($_POST['nom']);
                $prenom = $cnx->escape_string($_POST['prenom']);

                 //faire la requete qui cherche le prochain identifiant pour l'utilisateur
                 $txtReqIdentifiant= $cnx->query("SELECT ifnull(max(idUser),1000)+1 FROM User;");
                 $resultatId=mysql_query($txtReqIdentifiant);
                 $tabInfo=mysql_fetch_array($resultatId);
                 $prochainIdentifiant=$tabInfo[0];

                // vérification de l'absence d'utilisateur inscrit sous ce pseudo
                $result = $cnx->query('SELECT idUser from User where username="'.$username.'"');
                if ($result === false OR $result->num_rows < 1) {

                    $resultat = $cnx->query('SELECT idUser from User where email="'.$email.'"');
                    if ($resultat === false OR $resultat->num_rows < 1) {

                        $resul = $cnx->query('SELECT idUser from User where tel="'.$tel.'"');
                        if ($resul === false OR $resul->num_rows < 1) {

                            // enregistrement des informations
                            $R = 'INSERT INTO User(idUser, username, password, email, dateInscription, typeUser, adresseIp, tentativeCo, nom, prenom, tel, imgProfil, descriptionProfil, valideCompte, idVille) VALUES ("'.$prochainIdentifiant.'","'.$username.'", "'.$password.'", "'.$email.'","now()","'.$typeUser.'","NULL","NULL","'.$nom.'","'.$prenom.'","'.$tel.'","NULL","NULL","NULL","NULL")';
                            //echo $R;
                         if($cnx->query($R))
                         {
                            $form = true;
                            echo '<div>Vous avez été inscrit.<br> Vous pouvez vous connecter.<br></div>';
                            header('Location: index.php');
                         }
                         else {
                            $form = true;
                            $message = "Une erreur est survenue <br> lors de l'inscription.";
                         }
                        }
                        else {
                            $form = true;
                            $message = "Numéro de téléphonne déjà utilisé.<br>Veuillez en saisir un autre.";
                        }
                    }        
                    else {
                        $form = true;
                        $message = 'Email déjà utilisé.<br>Veuillez en saisir une autre.';
                    }
                }
                else {
                    $form = true;
                    $message = 'Identifiant déjà assigné.<br> Veuillez en saisir un autre.';
                }
        }
        else {
            $form = true;
            $message = 'Le mot de passe que vous avez entré <br> contient moins de 6 caractères.';
        }
    }
    else {
        $form = true;
        $message = 'Les mots de passe que vous avez entré <br> ne sont pas identiques.';
    }
}
else {
    $form = true;
}
}

    //On affiche un message sil y a lieu
    if(isset($message))
    {
            echo '<div>'.$message.'</div>';
    }
?>
            <!-- ouverture deuxième fenêtre -->

                <div class="text-center">
                    <h3 class="h3-responsive"><i class="fa fa-user-plus"></i> Inscription</h3> 
                    <!--
                        wsl_render_auth_widget
                        WordPress Social Login 2.3.0.
                        http://wordpress.org/plugins/wordpress-social-login/
                    -->
                    <style type="text/css">
                    .wp-social-login-connect-with{}.wp-social-login-provider-list{}.wp-social-login-provider-list a{}.wp-social-login-provider-list img{}.wsl_connect_with_provider{}
                    </style>
                    <div class="wp-social-login-widget">

                        <div class="wp-social-login-connect-with">S'inscrire avec :</div>

                  
                        </div>
                    <!-- wsl_render_auth_widget -->
                    <hr>
                    <h3 class="h3-responsive"> Ou :</h3>
                </div>
                <!-- fin du textcenter-->
                <p class="status"></p>
                <input type="hidden" id="signonsecurity" name="signonsecurity" value="256874042c" /><input type="hidden" name="_wp_http_referer" value="/" />
                <div class="md-form">
                    <i class="fa fa-user prefix"></i>
                    <input type="text" id="signonname" class="form-control" name="nom" placeholder="Votre nom">
                    <label for="signonname"></label>
                </div>
                <div class="md-form">
                    <i class="fa fa-user prefix"></i>
                    <input type="text" id="signonpname" class="form-control" name="prenom" placeholder="Votre prénom">
                    <label for="signonpname"></label>
                </div>
                <div class="md-form">
                    <i class="fa fa-envelope prefix"></i>
                    <input type="email" id="email" class="form-control" name="email" placeholder="Votre email">
                    <label for="email"></label>
                </div>
                  <div class="md-form">
                    <i class="fa fa-user-o prefix"></i>
                    <input type="text" id="identifiant" class="form-control" name="identifiant" placeholder="Créer un identifiant">
                    <label for="identifiant"></label>
                </div>
                <div class="md-form">
                    <i class="fa fa-lock prefix"></i>
                    <input type="password" id="password" class="form-control" name="passwd1" placeholder="Votre mot de passe">
                    <label for="password"></label>
                </div>

                <div class="md-form">
                    <i class="fa fa-lock prefix"></i>
                    <input type="password" id="password2" class="form-control" name="password2" placeholder="Repetez le mot de passe">
                    <label for="password2"></label>
                </div>

                 <div class="md-form">
                    <i class="fa fa-phone prefix"></i>
                    <input type="text" id="tel" class="form-control" name="tel" placeholder="Votre numéro de téléphone">
                    <label for="tel"></label>
                </div>

                 <div class="md-form">
                    <i class="fa fa-users prefix"></i>
                    <input type="text" id="typeUser" class="form-control" name="typeUser" placeholder="Distributeur / Consommateur / Producteur">
                    <label for="typeUser"></label>
                </div>

                <div class="text-center">
                    <button class="submit_button btn btn-primary" type="submit" name="signup" value="SIGNUP">S'inscrire</button>

                    <hr>

                    <p>Vous avez déjà un compte?<br> <a href="index.php"><i class="fa fa-home"></i>Retour a l'acceuil</a></p>
             
                </div>
<?php  ?>
              </form> 
        <!--Footer links-->
        <?php include ('footerLinks.html');?>
        <!--/.Footer links-->

        <!--Copyright-->
         <?php include ('bas.html');?>
        <!--/.Copyright-->
