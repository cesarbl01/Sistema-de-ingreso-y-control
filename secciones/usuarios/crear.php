<?php
include("../../bd.php");

if ($_POST) {
    $id = isset($_POST["ID"]) ? $_POST["ID"] : "";
    $usuario = isset($_POST["Nombreusuario"]) ? $_POST["Nombreusuario"] : "";
    $password = isset($_POST["Password"]) ? $_POST["Password"] : "";
    $correo = isset($_POST["Correo"]) ? $_POST["Correo"] : "";

    $sentencia = $conexion->prepare("INSERT INTO usuarios (ID, Nombreusuario, Password, Correo) VALUES (:ID, :Nombreusuario, :Password, :Correo)");
    $sentencia->bindParam(":ID", $id);
    $sentencia->bindParam(":Nombreusuario", $usuario);
    $sentencia->bindParam(":Password", $password);
    $sentencia->bindParam(":Correo", $correo);
    $sentencia->execute();
    
    header("Location: index.php");
    exit(); // added exit to stop script execution after redirection
}
?>
<?php include ("../../plantillas/header.php");?>

<div class="card">
    <div class="card-header">Usuarios</div>
    <div class="card-body">

    <form action="" method="post"enctype="multipart/form-data">

    <div class="mb-3">
        <label for="ID" class="form-label">ID</label>
        <input type="text" class="form-control" name="ID" id="ID" aria-describedby="helpId" placeholder="ID"
        />
    </div>
    
    <div class="mb-3">
        <label for="Nombreusuario" class="form-label">Nombreusuario</label>
        <input type="text" class="form-control" name="Nombreusuario" id="Nombreusuario" aria-describedby="helpId" placeholder="Nombreusuario"
        />
    </div>

    <div class="mb-3">
        <label for="Password" class="form-label">Password</label>
        <input type="password" class="form-control" name="Password" id="Password" aria-describedby="helpId" placeholder="Password"
        />
    </div>

    <div class="mb-3">
        <label for="Correo" class="form-label">Correo</label>
        <input type="email" class="form-control" name="Correo" id="Correo" aria-describedby="helpId" placeholder="Correo"
        />
    </div>

    <button type="sumit" class="btn btn-success"> Agregar registro</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

    </form>
      
    </div>
    
</div>

<?php include ("../../plantillas/footer.php");?>