
<?php include("../../plantillas/header.php"); ?>

<?php  
include("../../bd.php");

$id = $apartamento = "";

if(isset($_GET['txtID'])){
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

    $sentencia = $conexion->prepare("SELECT * FROM `apartamentos` WHERE ID=:ID");
    $sentencia->bindParam(":ID", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_ASSOC);

    // Assign values to variables
    $id = $registro["ID"];
    $apartamento = $registro["Apartamento"];
    
}

if ($_POST) {
    $id = (isset($_POST["ID"]) ? $_POST["ID"] : "");
    $apartamento = (isset($_POST["Apartamento"]) ? $_POST["Apartamento"] : "");

    $sentencia = $conexion->prepare("UPDATE apartamentos SET ID=:ID, Apartamento=:Apartamento
    WHERE ID=:ID");
    $sentencia->bindParam(":ID", $id);
    $sentencia->bindParam(":Apartamento", $apartamento);
    $sentencia->execute();
    header("Location:index.php");
    exit(); 
}

// Use echo to output values in input fields
?>

<div class="card">
    <div class="card-header">Apartamentos</div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="Placa" class="form-label">ID</label>
                <input type="text" 
                value="<?php echo $id; ?>"
                class="form-control" name="ID" id="ID" aria-describedby="helpId" placeholder="ID" />
            </div>

            <div class="mb-3">
                <label for="Color" class="form-label">Apartamento</label>
                <input type="text" 
                value="<?php echo $apartamento; ?>"
                class="form-control" name="Apartamento" id="Apartamento" aria-describedby="helpId" placeholder="Apartamento" />
            </div>


            <button type="submit" class="btn btn-success">Actualizar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
</div>

<?php include("../../plantillas/footer.php"); ?>