<?php

include("../../bd.php");

if ($_POST) {
    $placa = (isset($_POST["Placa"]) ? $_POST["Placa"] : "");
    $color = (isset($_POST["Color"]) ? $_POST["Color"] : "");
    $tipovehiculo = (isset($_POST["Tipo"]) ? $_POST["Tipo"] : ""); // corrected variable name
    $marca = (isset($_POST["Marca"]) ? $_POST["Marca"] : "");

    $sentencia = $conexion->prepare("INSERT INTO vehiculos(Placa, Color, Tipovehiculo, Marca) VALUES (:Placa, :Color, :Tipovehiculo, :Marca)");
    $sentencia->bindParam(":Placa", $placa);
    $sentencia->bindParam(":Color", $color);
    $sentencia->bindParam(":Tipovehiculo", $tipovehiculo);
    $sentencia->bindParam(":Marca", $marca);
    $sentencia->execute();
    header("Location:index.php");
    exit(); // added exit to stop script execution after redirection
}

?>

<?php include("../../plantillas/header.php"); ?>

<div class="card">
    <div class="card-header">Vehiculos</div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="Placa" class="form-label">Placa</label>
                <input type="text" class="form-control" name="Placa" id="Placa" aria-describedby="helpId" placeholder="Placa" />
            </div>

            <div class="mb-3">
                <label for="Color" class="form-label">Color</label>
                <input type="text" class="form-control" name="Color" id="Color" aria-describedby="helpId" placeholder="Color" />
            </div>

            <div class="mb-3">
                <label for="Tipo" class="form-label">Tipo</label>
                <input type="text" class="form-control" name="Tipo" id="Tipo" aria-describedby="helpId" placeholder="Tipo" />
            </div>

            <div class="mb-3">
                <label for="Marca" class="form-label">Marca</label>
                <input type="text" class="form-control" name="Marca" id="Marca" aria-describedby="helpId" placeholder="Marca" />
            </div>

            <button type="submit" class="btn btn-success">Agregar registro</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
</div>

<?php include("../../plantillas/footer.php"); ?>