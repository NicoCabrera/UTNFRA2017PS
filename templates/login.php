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
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Sign In</a></li>
                <li><a href="#">Sign Up</a></li>
            </ul>
        </div><!-- /.container-fluid -->
    </nav>

    <div class="container" ng-controller="LoginController" ng-app="myApp">

        <div class="page-header">
            <h1><strong>{{appName}}</strong> <small>{{title}}</small></h1>
        </div>

        <form action ="index.html" method="POST" class="form-horizontal">
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="usuario">Usuario</label>
                    <input type="text" class="form-control" name="usuario" placeholder="Ingrese su usuario" maxlength="50" ng-model="username">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="contraseña">Contraseña</label>
                    <input type="password" name="contraseña" class="form-control"placeholder="Ingrese su contraseña" maxlength="50" ng-model="password">
                </div>
            </div>
            <div class="col-sm-10">
            <a class="btn btn-primary" href="#" role="button">Iniciar sesión</a>
            </div>
        </form>
    </div>
    
     <!--angular-->
    <script src ="bower_components/angular/angular.min.js"></script>

    <!--modulos angular-->
    <script src ="js/modules/app.js"></script>

    <!--controllers angular-->
    <script src ="js/controllers/loginController.js"></script>
    </body>
</html>
