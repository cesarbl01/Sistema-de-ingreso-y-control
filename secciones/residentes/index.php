<?php

include("../../bd.php");

if(isset($_GET['txtID'])){
    $txtID=(isset($_GET['txtID']))? $_GET['txtID']:"";

    $sentencia=$conexion->prepare("DELETE FROM `residentes` WHERE Cedula=:Cedula");
    $sentencia->bindParam(":Cedula",$txtID);
    $sentencia->execute();
    header("Location:index.php");

}

$sentencia = $conexion->prepare("SELECT *,
    (SELECT Placa
    FROM `vehiculos`
    WHERE vehiculos.PLaca = residentes.Vehiculo LIMIT 1) as Vehiculo,
    (SELECT Apartamento
    FROM `apartamentos`
    WHERE apartamentos.ID = residentes.Apartamento limit 1) as Apartamento
FROM residentes");

$sentencia->execute();
$lista_residentes = $sentencia->fetchAll(PDO::FETCH_ASSOC);


?>

<?php include ("../../plantillas/header.php");?>

<br/>
<h4> Residentes</h4>
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
            class="table table" id="tabla_id"
        >
            <thead>
                <tr>
                    <th scope="col">Cedula</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Genero</th>
                    <th scope="col">Vehiculo</th>
                    <th scope="col">Apartamento</th>
                    <th scope="col">Fecha ingreso</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($lista_residentes as $registro) { ?>

                <tr class="">
                    <td><?php echo $registro['Cedula']; ?></td>
                    <td scope="row">
                    <?php echo $registro['Primernombre']; ?>
                    <?php echo $registro['Segundonombre']; ?>
                    <?php echo $registro['Primerapellido']; ?>
                    <?php echo $registro['Segundoapellido']; ?>
                    </td>
                    <td><?php echo $registro['Genero']; ?></td>
                    <td><?php echo $registro['Vehiculo']; ?></td>
                    <td><?php echo $registro['Apartamento']; ?></td>
                    <td><?php echo $registro['Fechaingreso']; ?></td>
                    <td>
            <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registro ['Cedula'];?>" role="button" >Editar</a >

            <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $registro ['Cedula'];?>" role="button" >Eliminar</a >
            
            </td>
                </tr>
                <?php } ?> 
            </tbody>
        </table>
    </div>
    
    </div>
    
</div>

<?php include ("../../plantillas/footer.php");?>