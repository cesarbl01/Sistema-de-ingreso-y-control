<?php
include("../../bd.php");

if(isset($_GET['txtID'])){
    $txtID=(isset($_GET['txtID']))? $_GET['txtID']:"";

    $sentencia=$conexion->prepare("DELETE FROM `apartamentos` WHERE ID=:ID");
    $sentencia->bindParam(":ID",$txtID);
    $sentencia->execute();
    header("Location:index.php");

}

$sentencia = $conexion->prepare("SELECT * FROM `apartamentos`");
$sentencia->execute();
$lista_apartamentos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include("../../plantillas/header.php"); ?>

<br/>
<h4> Apartamentos</h4>
<br/>
<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">
            Agregar registro
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
        <table class="table" id="tabla_id">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Numero de apartamento</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($lista_apartamentos as $registro) {
        ?>
        <tr class="">
            <td scope="row"><?php echo $registro['ID']; ?></td>
            <td><?php echo $registro['Apartamento']; ?></td>

            <td>
            <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registro ['ID'];?>" role="button" >Editar</a >

            <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $registro ['ID'];?>" role="button" >Eliminar</a >
            
            </td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>
        </div>
    </div>
</div>

<?php include("../../plantillas/footer.php"); ?>