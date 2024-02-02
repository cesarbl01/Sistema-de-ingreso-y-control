<?php include ("../../plantillas/header.php");?>

<?php  
include("../../bd.php");


if(isset($_GET['txtID'])){
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

    $sentencia = $conexion->prepare("SELECT * FROM `visitantes` WHERE Cedula=:Cedula");
    $sentencia->bindParam(":Cedula", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_ASSOC);

    // Assign values to variables
    $cedula = $registro["Cedula"];
    $primernombre = $registro["Primernombre"];
    $segundonombre = $registro["Segundonombre"];
    $primerapellido = $registro["Primerapellido"];
    $primerapellido = $registro["Primerapellido"];
    $segundoapellido = $registro["Segundoapellido"];
    $genero = $registro["Genero"];
    $vehiculo = $registro["Vehiculo"];
    $apartamento = $registro["Apartamento"];
    $fechaingreso = $registro["Fechaingreso"];

    // Obtener la lista de vehículos
$sentencia_vehiculos = $conexion->prepare("SELECT * FROM `vehiculos`");
$sentencia_vehiculos->execute();
$lista_vehiculos = $sentencia_vehiculos->fetchAll(PDO::FETCH_ASSOC);

// Obtener la lista de apartamentos
$sentencia_apartamentos = $conexion->prepare("SELECT * FROM `apartamentos`");
$sentencia_apartamentos->execute();
$lista_apartamentos = $sentencia_apartamentos->fetchAll(PDO::FETCH_ASSOC);

}

if ($_POST) {
    $cedula = (isset($_POST["Cedula"]) ? $_POST["Cedula"] : "");
    $primernombre = (isset($_POST["Primernombre"]) ? $_POST["Primernombre"] : "");
    $segundonombre = (isset($_POST["Segundonombre"]) ? $_POST["Segundonombre"] : "");
    $primerapellido = (isset($_POST["Primerapellido"]) ? $_POST["Primerapellido"] : "");
    $segundoapellido = (isset($_POST["Segundoapellido"]) ? $_POST["Segundoapellido"] : "");
    $genero = (isset($_POST["Genero"]) ? $_POST["Genero"] : "");
    $vehiculo = (isset($_POST["Vehiculo"]) ? $_POST["Vehiculo"] : "");
    $apartamento= (isset($_POST["Apartamento"]) ? $_POST["Apartamento"] : "");
    $fechaingreso = (isset($_POST["Fechaingreso"]) ? $_POST["Fechaingreso"] : "");

    $sentencia = $conexion->prepare("UPDATE visitantes SET Cedula=:Cedula, Primernombre=:Primernombre, Segundonombre=:Segundonombre, Primerapellido=:Primerapellido,
    Segundoapellido=:Segundoapellido, Genero=:Genero, Vehiculo=:Vehiculo, Apartamento=:Apartamento, Fechaingreso=:Fechaingreso
    WHERE Cedula=:Cedula");
    $sentencia->bindParam(":Cedula", $cedula);
    $sentencia->bindParam(":Primernombre", $primernombre);
    $sentencia->bindParam(":Segundonombre", $segundonombre);
    $sentencia->bindParam(":Primerapellido", $primerapellido);
    $sentencia->bindParam(":Segundoapellido", $segundoapellido);
    $sentencia->bindParam(":Genero", $genero);
    $sentencia->bindParam(":Vehiculo", $vehiculo);
    $sentencia->bindParam(":Apartamento", $apartamento);
    $sentencia->bindParam(":Fechaingreso", $fechaingreso);
    $sentencia->execute();
    header("Location:index.php");
    exit(); 
}

// Use echo to output values in input fields
?>

<br/>
<div class="card">
    <div class="card-header">
        Datos del visitante
    </div>
    <div class="card-body">

        <form action="" method="post">
            
             <div class="mb-3">
                <label for="Cedula" class="form-label">Cedula</label>
                <input type="text" 
                value="<?php echo $cedula; ?>"
                class="form-control" name="Cedula" id="Cedula" aria-describedby="helpId" placeholder="Cedula"/>
            </div>

            <div class="mb-3">
                <label for="Primernombre" class="form-label">Primer nombre</label>
                <input type="text" 
                value="<?php echo $primernombre; ?>"
                class="form-control" name="Primernombre" id="Primernombre" aria-describedby="helpId" placeholder="Primernombre"/>
            </div>

            <div class="mb-3">
                <label for="Segundonombre" class="form-label">Segundo nombre</label>
                <input type="text" 
                value="<?php echo $segundonombre; ?>"
                class="form-control" name="Segundonombre" id="Segundonombre" aria-describedby="helpId" placeholder="Segundonombre"/>
            </div>

            <div class="mb-3">
                <label for="Primerapellido" class="form-label">Primer apellido</label>
                <input type="text" 
                value="<?php echo $primerapellido; ?>"
                class="form-control" name="Primerapellido" id="Primerapellido" aria-describedby="helpId" placeholder="Primerapellido"/>
            </div>

            <div class="mb-3">
                <label for="Segundoapellido" class="form-label">Segundo apellido</label>
                <input type="text" 
                value="<?php echo $segundoapellido; ?>"
                class="form-control" name="Segundoapellido" id="Segundoapellido" aria-describedby="helpId" placeholder="Segundo apellido"/>
            </div>

            <div class="mb-3">
    <label for="Idgenero" class="form-label">Genero</label>
    <select class="form-select form-select-sm" name="Genero" id="Idgenero">
        <option selected>Seleccione genero</option>
        <option value="Masculino">Masculino</option>
        <option value="Femenino">Femenino</option>
    </select>
</div>

            <div class="mb-3">
    <label for="Vehiculo" class="form-label">Vehiculo</label>
    <select class="form-select form-select-sm" name="Vehiculo" id="Vehiculo">
        <option value="">Seleccione vehículo</option>
        <?php foreach ($lista_vehiculos as $vehiculo) { ?>
            <option value="<?php echo $vehiculo['Placa'] ?>"><?php echo $vehiculo['Placa'] ?></option>
        <?php } ?>
    </select>
</div>

<div class="mb-3">
    <label for="Apartamento" class="form-label">Apartamento</label>
    <select class="form-select form-select-sm" name="Apartamento" id="Apartamento">
        <option value="">Seleccione apartamento</option>
        <?php foreach ($lista_apartamentos as $apartamento) { ?>
            <option value="<?php echo $apartamento['ID'] ?>"><?php echo $apartamento['ID'] ?></option>
        <?php } ?>
    </select>
</div>

<div class="mb-3">
    <label for="Fechaingreso" class="form-label">Fecha de ingreso</label>
    <input type="date" 
    value="<?php echo $fechaingreso; ?>"
    class="form-control" name="Fechaingreso" id="Fechaingreso" aria-describedby="emailHelpId" placeholder="Fecha de ingreso" />
</div>
            
            <button type="sumit" class="btn btn-success"> Agregar registro</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
            
            
            
        </form>
    </div>
    
</div>



<?php include ("../../plantillas/footer.php");?>