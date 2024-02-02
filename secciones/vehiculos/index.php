<?php

include("../../bd.php");

if(isset($_GET['txtID'])){
    $txtID=(isset($_GET['txtID']))? $_GET['txtID']:"";

    $sentencia=$conexion->prepare("DELETE FROM `vehiculos` WHERE Placa=:Placa");
    $sentencia->bindParam(":Placa",$txtID);
    $sentencia->execute();
    header("Location:index.php");

}

$sentencia=$conexion->prepare("SELECT * FROM `vehiculos`");
$sentencia->execute();
$lista_vehiculos=$sentencia->fetchAll(PDO::FETCH_ASSOC);


?>

<?php include ("../../plantillas/header.php");?>

<br/>
<h4> Vehiculos</h4>
<br/>
<div class="card">
    <div class="card-header">
    <a name=""id=""class="btn btn-primary"
        href="crear.php"role="button">
        Agregar registro
        </a>
    </div>
    <div class="card-body">
    <div
    class="table-responsive-sm"
>
    <table
        class="table" id="tabla_id"
    >
        <thead>
            <tr>
                <th scope="col">Placa</th>
                <th scope="col">Color</th>
                <th scope="col">Tipo</th>
                <th scope="col">Marca</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>

        <?php foreach ($lista_vehiculos as $registro) { ?>
        <tr class="">
            <td scope="row"><?php echo $registro['Placa']; ?></td>
            <td><?php echo $registro['Color']; ?></td>
            <td><?php echo $registro['Tipovehiculo']; ?></td>
            <td><?php echo $registro['Marca']; ?></td>

            <td>
            <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registro ['Placa'];?>" role="button" >Editar</a >

            <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $registro ['Placa'];?>" role="button" >Eliminar</a >
            
            </td>
        </tr>
    <?php } ?>  
            
            
        </tbody>
    </table>
</div>
    </div>
    
</div>




<?php include ("../../plantillas/footer.php");?>