<?php
include("connexionBase.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>New World !</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">

    <!-- My Css -->
  <link href="css/style.css" rel="stylesheet">

    <!-- Template styles -->
    <style rel="stylesheet">
        /* TEMPLATE STYLES */

        /* Necessary for full page carousel*/
        html,
        body,
        .view {
            height: 100%;
        }
        /* Navigation*/
        
        .navbar {
            background-color: transparent;
        }
        
        .scrolling-navbar {
            -webkit-transition: background .5s ease-in-out, padding .5s ease-in-out;
            -moz-transition: background .5s ease-in-out, padding .5s ease-in-out;
            transition: background .5s ease-in-out, padding .5s ease-in-out;
        }
        
        .top-nav-collapse {
            background-color: #2b3f66;
        }
        
        footer.page-footer {
            background-color: #2b3f66;
            margin-top: 0;
        }
        
        @media only screen and (max-width: 768px) {
            .navbar {
                background-color: #2b3f66;
            }
        }
        /* Carousel*/
        
        .carousel,
        .carousel-item,
        .active {
            height: 100%;
        }
        
        .carousel-inner {
            height: 100%;
        }
        /*Caption*/
        
        .flex-center {
            color: #fff;
        }
        
        @media (min-width: 776px) {
            .carousel .view ul li {
                display: inline;
            }
            .carousel .view .full-bg-img ul li .flex-item {
                margin-bottom: 1.5rem;
            }
        }
        .navbar .btn-group .dropdown-menu a:hover {
            color: #000 !important;
        }
        .navbar .btn-group .dropdown-menu a:active {
            color: #fff !important;
        }
    </style>

    <!-- Mon CSS -->
    <link href="css/myCss.css" rel="stylesheet">
</head>

<body> 
<nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar ">
            <div class="container">
                <a class="navbar-brand" href="#">NW</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php"><i class="fa fa-home"></i>Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Acheter</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Produire</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="#">Distribuer</a>
                        </li>
                        <?php 
                          if (isset($_SESSION['username']))
                          {
                            $username=$_SESSION['username'];
                        ?>  
                            <p class="nav-item ml-sm-5 text-white">Bievenu <?php echo $username ?></p>
                         <li class="nav-item ml-sm-5">
                            <a href="deconnexionNW.php" class="nav-link"><i class="fa fa-sign-in"></i>Déconnexion</a>
                        <?php
                          } else { 
                        ?>
                            <a href="#modal_login" id="show_login" class="nav-link" data-toggle="modal" data-target="#modal_login"><i class="fa fa-sign-in"></i>Connexion</a>
                        <?php
                          }
                        ?>
                        </li>
                    </ul>
                    <form class="form-inline">
                        <i class="fa fa-search" style="color:white;"></i><input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                    </form>

                </div>
            </div>
        </nav>

<div id="fb-root"></div>
<!-- chargement de la biblio fb d'identification -->
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.8&appId=586941824848574";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<script>
  // This is called with the results from  FB.getLoginStatus().
  function statusChangeCallback(response) 
  {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else {
      // The person is not logged into your app or we are unable to tell
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    }
  }//fin du statusChangeCallback(response)

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
    FB.init({
      appId      : '{your-app-id}',
      cookie     : true,  // enable cookies to allow the server to access 
                          // the session
      xfbml      : true,  // parse social plugins on this page
      version    : 'v2.8' // use graph api version 2.8
    });

    // Now that we've initialized the JavaScript SDK, we call 
    // FB.getLoginStatus().  This function gets the state of the
    // person visiting this page and can return one of three states to
    // the callback you provide.  They can be:
    //
    // 1. Logged into your app ('connected')
    // 2. Logged into Facebook, but not your app ('not_authorized')
    // 3. Not logged into Facebook and can't tell if they are logged into
    //    your app or not.
    //
    // These three cases are handled in the callback function.

    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });

  };//fin de la fonction window.fbAsyncInit
  
//ma fonction pour poster les données reçues de facebook
  function postDonneesFB(idFB, mailFB)
  { 
    var request = $.ajax({
    url: "http://gthom.btsinfogap.org/newWorld/traiteFormulaires.php",
    method: "POST",
    data: { idFacebook : idFB, mailFacebook : mailFB  }
    });
    request.done(function( msg ) 
    {
      console.log( msg );
      //location="http://gthom.btsinfogap.org/newWorld/index.php";
      //fermer la fenêtre modal_login en jquery
      //$("#modal_login").close;//not function

      $("#modal_login .close").click();
      //window.referer.location="http://gthom.btsinfogap.org/newWorld/index.php";marche pas
    });
    request.fail(function( msg ) 
    {
      console.log("ident facebook erreur");
      //location.reload();
      //fermer la fenêtre modal_login en jquery marche pas
      //$("#modal_login").close;
    });
  }//fin de la fonction postDonneesFB(idFB, mailFB)
  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() 
  {
    
    FB.api('/me?fields=name,email,id', function(response) {
      //traitement de la reponse
      postDonneesFB(response.id,response.email );
      //fin du traitement de la réponse
    },{scope: 'email,public_profile'});
  }//fin de la fonction testAPI()
 
</script>
<div class="modal fade modal-ext" id="modal_login" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="login" class="ajax-auth" action="" method="post">
<?php
  $username = '';

  // Traitement du formulaire 
  if(isset($_REQUEST['login']))
  {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // récupération du mot de passe utilisateur
    $txtReq="select password, idUser from User where password='".$password."' and username='".$username."'";
    $result = $cnx->query($txtReq);
    if ($result=== false OR $result->num_rows<1) {
        $message = 'Utilisateur inconnu ou mauvais mot de passe';
    }
    else 
    {
        $ligne = $result->fetch_array();
        // màj du username et identifiant dans la session
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['idUser'] = $ligne['idUser'];
        
        $message= 'Connexion réussie';
        //header('Location: index.php');
     
    }
  }
    // affichage éventuel d'un message sil y a lieu
    if(isset($message)) 
    {
      echo $message;
    }
?>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <div class="text-center">
                    <h3 class="h3-responsive"><i class="fa fa-sign-in"></i> Connexion : </h3>
                   
                    <!--
                        wsl_render_auth_widget
                        WordPress Social Login 2.3.0.
                        http://wordpress.org/plugins/wordpress-social-login/
                    -->

                    <style type="text/css">
                    .wp-social-login-connect-with{}.wp-social-login-provider-list{}.wp-social-login-provider-list a{}.wp-social-login-provider-list img{}.wsl_connect_with_provider{}</style>

                    <div class="wp-social-login-widget">

                        <div class="wp-social-login-connect-with">Se connecter avec:</div>

                    
                        </div>
                    <!-- wsl_render_auth_widget -->
                    <hr>
                    <h3 class="h3-responsive"> Ou:</h3>
                    <p class="status"></p>
                    <input type="hidden" id="security" name="security" value="aaeeddaed125" /><input type="hidden" name="_wp_http_referer" value="/" />
                    <div class="md-form">
                        <!--<label for="username">Votre identifiant</label>-->
                        <i class="fa fa-user prefix"></i>
                        <input type="text" id="username" class="form-control" name="username" placeholder="Identifiant">                
                    </div>

                    <div class="md-form">
                        <i class="fa fa-lock prefix"></i>
                        <input type="password" id="password" class="form-control" name="password" placeholder="Mot de passe">
                        <!--<label for="password">Votre mot de passe</label>-->
                    </div>

                    <div class="text-center">
                        <button class="submit_button btn btn-primary" type="submit" name="login" value="LOGIN">Se Connecter</button>
                    </div>

                    <hr>
                    <div class="text-center">
                        <p>Pas encore inscrit? <a href="inscriptionNW.php">S'inscrire</a></p>
                        <p> Mot de passe <a href="#">oublié?</a></p>
                    </div>
                </div>
                <!-- fin de la div textcenter -->
            </form>
            <!-- fin de la première fenêtre-->
        </div>
    </div>
</div>
<!-- chargement de jquery -->
<!-- JQuery -->
<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
<script>
//rechargement de la page principale lors de la fermeture de la fenêtre de login
  $('#modal_login').on('hidden.bs.modal', function () {
    location.reload();
  });
</script>
