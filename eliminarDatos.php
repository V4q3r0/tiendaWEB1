<?php

    include("inc/baseDatos.php");

    $id = $_GET['id'];

    $transaccion = new BaseDatos();

    $consulta = "DELETE FROM producto WHERE idProducto = '$id'";

    $transaccion->eliminarDatos($consulta);

    header("Location: bodega.php");

?>
