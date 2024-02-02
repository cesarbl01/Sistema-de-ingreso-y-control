<?php
session_start();
session_destroy();
header("Location: /sic/login.php");
exit; // Asegúrate de agregar exit para detener la ejecución del script después de la redirección
?>