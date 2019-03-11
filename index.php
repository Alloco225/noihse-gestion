<?php
    // require 'admin/database.php';
    // session_start();
    // if(!isset($_SESSION['connexionID']))
    // {
    //     header('location:login.php');
    // }else
    // {   
    //     $db = Database::connect();
    //     $data = $db->prepare('INSERT INTO connexion(id, dateDebut, userID)');
    //     $data->execute(array($_SESSION['username']));
    //     $user = $data->fetch();
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
        /* form {}

        input,
        select {
            border: none !important;
            height: 100% !important;
            width: 100% !important;
        } */
    </style>
</head>
<body>
    <div class="container pt-md-2 col-md-8">
        <!--  -->
        <div class="row mx-md-auto">
            <div class="col-6 d-flex align-items-center">
                <span class="h5">
                    <span class="">Date : </span>08/03/2019
                </span>
            </div>
            <div class="col-6 text-right">

                <img src="img/admin.jpg" alt="Photo" class="img-fluid rounded" width="20%">
                <span class="text-capitalize h5">nom prenom</span>

                <span class="dropdown">
                    <button class="btn dropdown-toggle" data-toggle="dropdown"></button>
                    <div class="dropdown-menu">
                        <a href="login.php" class="dropdown-item" onclick="return confirm('Vous allez vous déconnecter');">
                            <i class="fa fa-power-off"></i> Se déconnecter
                        </a>
                    </div>
                </span>
            </div>
        </div> <!--  -->
<?php 
    // }
    // $data->closeCursor();
    // Database::disconnect(); 
?>
        <div class="col-2 border border-primary mx-auto my-3"></div><!-- divider -->
        <h3 class="text-center text-uppercase text-muted">Gestion des activités</h3>
        <!-- Main Body -->
        <main>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>N°</th>
                            <th>Activité</th>
                            <th>Quantité</th>
                            <th>Entrées</th>
                            <th>Sorties</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Database Data -->
                        <tr>
                            <td>1</td>
                            <td>Traitement de texte</td>
                            <td>3 pages</td>
                            <td>1500</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Scanner</td>
                            <td>3 pages</td>
                            <td>600</td>
                            <td>200</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Iternet 30min</td>
                            <td>3</td>
                            <td>300</td>
                            <td></td>
                        </tr>
                        <!-- Formulaire d'ajout -->
                        <tr class="form-input">
                            <form action="">
                                <td>
                                    <button class="btn">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </td>
                                <td>
                                    <select name="activite" id="" class="form-control">
                                        <option value="" disabled selected>--Activité--</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="number" class="form-control" placeholder="--Quantité--">
                                </td>
                                <td>
                                </td>
                                <td>
                                    <input type="number" class="form-control" placeholder="--Montant--">
                                </td>
                            </form>
                        </tr>
                    </tbody>
                    <tfoot class="thead-light">
                        <tr>
                            <th colspan="2" class="">
                                <span class="text-left">Total Journée : </span>
                                
                                <span class="number-total text-primary h4">2400</span>
                            </th>
                            <th>
                                Sorties : 
                                <span class="number-total text-right text-danger h4">200</span>
                            </th>
                            <th colspan="2">
                                Total Recette : 
                                <span class="number-total text-right text-success h4">2200</span>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </main>
    </div>
</body>
</html>