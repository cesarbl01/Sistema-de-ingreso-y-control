<?php
session_start();
if ($_POST) {
    
    // Incluye el archivo de conexión a la base de datos
    include("./bd.php");

    // Prepara la consulta SQL
    $sentencia = $conexion->prepare("SELECT *, COUNT(*) as n_usuarios
                                    FROM `usuarios`
                                    WHERE Nombreusuario=:Nombreusuario AND Password=:Password");

    // Obtiene los valores del formulario
    $usuario = $_POST["Nombreusuario"];
    $password = $_POST["Password"];

    // Asocia los parámetros
    $sentencia->bindParam(":Nombreusuario", $usuario);
    $sentencia->bindParam(":Password", $password);

    // Ejecuta la consulta
    $sentencia->execute();

    // Obtiene el resultado como un arreglo asociativo
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);

    if ($registro["n_usuarios"] > 0) {
        $_SESSION['Nombreusuario'] = $registro["Nombreusuario"];
        $_SESSION['Logeado'] = true;
        header("Location: index.php");
        exit; // Detiene la ejecución del script
    } else {
        $mensaje = "Error: El usuario o la contraseña son incorrectos";
    }
} 
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Login</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main class="cointainer">

        <div class ="row">

        <div class ="col-md-4">

        </div>

        <div class ="col-md-4">
        <br/>
        <div class="card">
            <div class="card-header">Login</div>
            <div class="card-body">
            <?php if(isset($mensaje)) {?>
            <div
                class="alert alert-danger"
                role="alert"
            >
                <strong><?php echo $mensaje;?></strong> 
            </div>
            <?php }?>
            
                
           <form action="" method="post">

           <div class="mb-3">
            <label for="" class="form-label">Nombreusuario</label>
            <input
                type="text"
                class="form-control"
                name="Nombreusuario"
                id="Nombreusuario"
                placeholder="Escriba su usuario"
            />

            <div class="mb-3">
            <label for="" class="form-label">Password</label>
            <input
                type="password"
                class="form-control"
                name="Password"
                id="Password"
                placeholder="Escriba su contraseña"
            />

            <button
                type="submit"
                class="btn btn-primary"
            >
                Entrar al sistema
            </button>
            

            </form>
           </div>
           
        </div>
        

        </div>





        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
