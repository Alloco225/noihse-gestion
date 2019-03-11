<?php
    // 
    require 'admin/database.php';
    session_start();
    // 
    $identifiant = $mdp = $identifiantError = $mdpError = $loginError = "";
    $isSuccess = false;
    // Deconnexion Logout
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        $base = Database::connect();
        $deconnexion = $base ->query('INSERT INTO connexion(dateFin) VALUES (CURDATE())');
        Database::disconnect();
        unset($_SERVER['Connection']);
        session_destroy();
    }
    // Connection Login Signup
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    { 
        $identifiant = checkInput($_POST["identifiant"]);
        $mdp         = checkInput($_POST["mdp"]);
        $isSuccess   = true; 
        // 
        if(empty($identifiant)){
            $identifiantError = "* Identifiant vide";
            $isSuccess = false;
        }
        if(empty($mdp)){
            $mdpError = "* Mot de passe vide";
            $isSuccess = false;
        }
        // 
        if(!empty($identifiant) && !empty($mdp))
        {   //
            $base = Database::connect();
            $req = $base ->prepare('SELECT identifiant, mdp FROM users WHERE identifiant = ? AND mdp = ?');
            $req -> execute(array($identifiant, $mdp));
            $loginOk = $req->fetch();
                if(!$loginOk){
                    $loginError = "Identifiant  ou Mot de passe incorrect";
                    $isSuccess = false;
                    // $connectMsg = "Vous n'avez pas de compte ? <a href='signup.php'>Inscrivez-vous</a>";
                }
                else {
                    $_SESSION['identifiant'] = $loginOk['identifiant'];
                }
            Database::disconnect();
        }
    }
    if($isSuccess){
        header('location:index.php');
    }
    function checkInput($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion des Activités</title>

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    </style>
</head>
<body style="background:#ccc;">
    <div class="container text-center rounded py-md-5 my-md-5 col-md-7 bg-light">
        <h3>Connexion Espace Emerite</h3>
        <div class="row border border-success col-2 mx-auto"></div><!-- Divider -->
        <form action="" class="col-md-6 mx-auto my-md-5">
            <input type="text" placeholder="Identifiant" class="form-control my-2">
            <div class="input-group">
                <input type="password" placeholder="Mot de passe" class="form-control">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <button class="" style="border:none;background-color:transparent;">
                            <i class="fa fa-eye"></i>
                        </button>
                    </div>
                </div>
            </div>
            <p class="">
                Mot de passe oublié ? Contactez <a href="https://api.whatsapp.com/send?phone=22574936826" target="_blank">Amané</a>
            </p>
            <div class="row mt-3">
                <div class="col-6">
                    <input type="submit" value="Connexion" class="btn btn-primary">
                </div>
                <div class="col-6">
                    <input type="reset" value="Annuler" class="btn btn-danger">
                </div>
            </div>
        </form>
    </div>
</body>
</html>