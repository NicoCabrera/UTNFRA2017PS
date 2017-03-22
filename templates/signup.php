<!DOCTYPE html>
<html lang="es">
    <head>
        <title>MyApp - Sign Up</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    </head>
    <body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="login">Sign In</a></li>
                <li><a href="#">Sign Up</a></li>
            </ul>
        </div><!-- /.container-fluid -->
    </nav>

    <div class="container" ng-controller="SignUpController" ng-app="myApp">

        <div class="page-header">
            <h1><strong>{{title}}</strong></h1>
        </div>

        <form action ="userSignUpValidation.php" method="POST" class="form-horizontal">
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="username">Usuario</label>
                    <input type="text" class="form-control" name="username" placeholder="Ingrese su usuario" maxlength="50" ng-model="username">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" class="form-control"placeholder="Ingrese su contraseña" maxlength="50" ng-model="password">
                </div>
            </div>
            <div class="col-sm-10">
                <input class="btn btn-primary" type="submit" value="{{submit}}">
            </div>
        </form>
    </div>
    
     <!--angular-->
    <script src ="bower_components/angular/angular.min.js"></script>

    <!--modulos angular-->
    <script src ="js/modules/app.js"></script>

    <!--controllers angular-->
    <script src ="js/controllers/signupController.js"></script>
    </body>
</html>
