<?php include ("../../plantillas/header.php");?>

<?php  
include("../../bd.php");

$id = $usuario = $password = $correo = "";

if(isset($_GET['txtID'])){
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

    $sentencia = $conexion->prepare("SELECT * FROM `usuarios` WHERE ID=:ID");
    $sentencia->bindParam(":ID", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_ASSOC);

    // Assign values to variables
    $id = $registro["ID"];
    $usuario = $registro["Nombreusuario"];
    $password = $registro["Password"];
    $correo = $registro["Correo"];
    
}

if ($_POST) {
    $id = (isset($_POST["ID"]) ? $_POST["ID"] : "");
    $usuario= (isset($_POST["Nombreusuario"]) ? $_POST["Nombreusuario"] : "");
    $password = (isset($_POST["Password"]) ? $_POST["Password"] : "");
    $correo = (isset($_POST["Correo"]) ? $_POST["Correo"] : "");

    $sentencia = $conexion->prepare("UPDATE usuarios SET ID=:ID, Nombreusuario=:Nombreusuario, Password=:Password, Correo=:Correo
    WHERE ID=:ID");
    $sentencia->bindParam(":ID", $id);
    $sentencia->bindParam(":Nombreusuario", $usuario);
    $sentencia->bindParam(":Password", $password);
    $sentencia->bindParam(":Correo", $correo);
    $sentencia->execute();
    header("Location:index.php");
    exit(); 
}

?>

<div class="card">
    <div class="card-header">Usuarios</div>
    <div class="card-body">

    <form action="" method="post"enctype="multipart/form-data">

    <div class="mb-3">
        <label for="ID" class="form-label">ID</label>
        <input type="text" 
        value="<?php echo $id; ?>"
        class="form-control" name="ID" id="ID" aria-describedby="helpId" placeholder="ID"
        />
    </div>
    
    <div class="mb-3">
        <label for="Nombreusuario" class="form-label">Nombreusuario</label>
        <input type="text" 
        value="<?php echo $usuario; ?>"
        class="form-control" name="Nombreusuario" id="Nombreusuario" aria-describedby="helpId" placeholder="Nombreusuario"
        />
    </div>

    <div class="mb-3">
        <label for="Password" class="form-label">Password</label>
        <input type="password"
        value="<?php echo $password; ?>"
        class="form-control" name="Password" id="Password" aria-describedby="helpId" placeholder="Password"
        />
    </div>

    <div class="mb-3">
        <label for="Correo" class="form-label">Correo</label>
        <input type="email" 
        value="<?php echo $correo; ?>"
        class="form-control" name="Correo" id="Correo" aria-describedby="helpId" placeholder="Correo"
        />
    </div>

    <button type="sumit" class="btn btn-success"> Actualizar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

    </form>
      
    </div>
    
</div>

<?php include ("../../plantillas/footer.php");?>