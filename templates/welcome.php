<!DOCTYPE html>
<html lang="es">
    <head>
        <title>MyApp - Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    </head>
    <body>
    <?php
        session_start();

        if(!isset($_SESSION["username"]))
        {
            header("location:login");
            die();
        }
    ?>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout">Log out</a></li>
            </ul>
        </div><!-- /.container-fluid -->
    </nav>

    <div class="container" ng-controller="WelcomeController" ng-app="myApp">

        <div class ="jumbotron">
            <h1>Bienvenido/a: <?php echo $_SESSION['username']?></h1>
        </div>
        <table class="table table-striped">
            <tr>
                <td class="info">...</td>
            </tr>
        </table>
    </div>
    
     <!--angular-->
    <script src ="bower_components/angular/angular.min.js"></script>

    <!--modulos angular-->
    <script src ="js/modules/app.js"></script>

    <!--controllers angular-->
    <script src ="js/controllers/welcomeController.js"></script>
    </body>
</html>
