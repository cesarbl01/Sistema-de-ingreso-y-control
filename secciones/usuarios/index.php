<?php

include("../../bd.php");

if(isset($_GET['txtID'])){
    $txtID=(isset($_GET['txtID']))? $_GET['txtID']:"";

    $sentencia=$conexion->prepare("DELETE FROM `usuarios` WHERE ID=:ID");
    $sentencia->bindParam(":ID",$txtID);
    $sentencia->execute();
    header("Location:index.php");

}

$sentencia=$conexion->prepare("SELECT * FROM `usuarios`");
$sentencia->execute();
$lista_usuarios=$sentencia->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include ("../../plantillas/header.php");?>

<br/>
<h4> Usuarios</h4>
<br/>
<div class="card">
    <div class="card-header">
    <a name=""id=""class="btn btn-primary"
        href="crear.php"role="button">
        Agregar Usuario
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
                <th scope="col">ID</th>
                <th scope="col">Nombre de usuario</th>
                <th scope="col">Contraseña</th>
                <th scope="col">Correo</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>

        <?php foreach ($lista_usuarios as $registro) { ?>
            <tr class="">
                <td scope="row"><?php echo $registro['ID']; ?></td>
                <td><?php echo $registro['Nombreusuario']; ?></td>
                <td>*******</td>
                <td><?php echo $registro['Correo']; ?></td>
                <td>
            <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registro ['ID'];?>" role="button" >Editar</a >

            <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $registro ['ID'];?>" role="button" >Eliminar</a >
            
            </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
    </div>
    
</div>
<?php include ("../../plantillas/footer.php");?>