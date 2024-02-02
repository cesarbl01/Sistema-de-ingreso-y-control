
<?php include("../../plantillas/header.php"); ?>

<?php  
include("../../bd.php");

$placa = $color = $tipoveiculo = $marca = "";

if(isset($_GET['txtID'])){
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

    $sentencia = $conexion->prepare("SELECT * FROM `vehiculos` WHERE Placa=:Placa");
    $sentencia->bindParam(":Placa", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_ASSOC);

    // Assign values to variables
    $placa = $registro["Placa"];
    $color = $registro["Color"];
    $tipoveiculo = $registro["Tipovehiculo"];
    $marca = $registro["Marca"];
}

if ($_POST) {
    $placa = (isset($_POST["Placa"]) ? $_POST["Placa"] : "");
    $color = (isset($_POST["Color"]) ? $_POST["Color"] : "");
    $tipoveiculo = (isset($_POST["Tipo"]) ? $_POST["Tipo"] : "");
    $marca = (isset($_POST["Marca"]) ? $_POST["Marca"] : "");

    $sentencia = $conexion->prepare("UPDATE vehiculos SET Placa=:Placa, Color=:Color, Tipovehiculo=:Tipoveiculo, Marca=:Marca
    WHERE Placa=:Placa");
    $sentencia->bindParam(":Placa", $placa);
    $sentencia->bindParam(":Color", $color);
    $sentencia->bindParam(":Tipoveiculo", $tipoveiculo);
    $sentencia->bindParam(":Marca", $marca);
    $sentencia->execute();
    header("Location:index.php");
    exit(); 
}

// Use echo to output values in input fields
?>

<div class="card">
    <div class="card-header">Vehiculos</div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="Placa" class="form-label">Placa</label>
                <input type="text" 
                value="<?php echo $placa; ?>"
                class="form-control" name="Placa" id="Placa" aria-describedby="helpId" placeholder="Placa" />
            </div>

            <div class="mb-3">
                <label for="Color" class="form-label">Color</label>
                <input type="text" 
                value="<?php echo $color; ?>"
                class="form-control" name="Color" id="Color" aria-describedby="helpId" placeholder="Color" />
            </div>

            <div class="mb-3">
                <label for="Tipo" class="form-label">Tipo</label>
                <input type="text" 
                value="<?php echo $tipoveiculo; ?>"
                class="form-control" name="Tipo" id="Tipo" aria-describedby="helpId" placeholder="Tipo" />
            </div>

            <div class="mb-3">
                <label for="Marca" class="form-label">Marca</label>
                <input type="text" 
                value="<?php echo $marca; ?>"
                class="form-control" name="Marca" id="Marca" aria-describedby="helpId" placeholder="Marca" />
            </div>

            <button type="submit" class="btn btn-success">Actualizar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
</div>

<?php include("../../plantillas/footer.php"); ?>