<?php
include("../../bd.php");

if ($_POST) {
    $id = isset($_POST["ID"]) ? $_POST["ID"] : "";
    $apartamento = isset($_POST["Apartamento"]) ? $_POST["Apartamento"] : "";

    $sentencia = $conexion->prepare("INSERT INTO apartamentos (ID, Apartamento) VALUES (:ID, :Apartamento)");
    $sentencia->bindParam(":ID", $id);
    $sentencia->bindParam(":Apartamento", $apartamento);
    $sentencia->execute();
    header("Location: index.php");
    exit(); // added exit to stop script execution after redirection
}
?>

<?php include("../../plantillas/header.php"); ?>

<div class="card">
    <div class="card-header">Apartamentos</div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="ID" class="form-label">ID</label>
                <input type="text" class="form-control" name="ID" id="ID" aria-describedby="helpId" placeholder="ID" />
            </div>

            <div class="mb-3">
                <label for="Apartamento" class="form-label">Apartamento</label>
                <input type="text" class="form-control" name="Apartamento" id="Apartamento" aria-describedby="helpId" placeholder="Apartamento" />
            </div>

            <button type="submit" class="btn btn-success">Agregar registro</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
</div>

<?php include("../../plantillas/footer.php"); ?>