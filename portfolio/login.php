<?php
session_start();
if ($_POST) {

    if ($_POST['usuario'] == "antonio" && ($_POST['clave'] == "123")) {

        $_SESSION['usuario'] = "antonio";
        header("Location: index.php");

        // session_start();



    } else {
        echo "<script>alert('Usuario o contraseña incorrectos')</script>";
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <br>
    <div class="container">

        <div class="row justify-content-center align-items-center g-2">
            <div class="col-md-4">

            </div>
            <div class="col-md-4">

                <div class="card">
                    <div class="card-header">
                        Iniciar Sesión
                    </div>
                    <div class="card-body">
                        <form action="login.php" method="post">

                            Usuario: <input class="form-control" type="text" name="usuario" id="usuario" required>
                            <br>
                            Contraseña: <input class="form-control" type="password" name="clave" id="clave" required>
                            <br>

                            <button type="submit" class="btn btn-success">Entrar al portafolio</button>

                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        <p> </p>
                    </div>
                </div>


            </div>
            <div class="col-md-4">

            </div>

        </div>
    </div>
</body>

</html>