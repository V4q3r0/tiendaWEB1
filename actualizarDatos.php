<?php 

    include ("inc/baseDatos.php");

    if(isset($_POST['btnEditar']))
    {
        $Id = $_GET['id'];
        $Nombre = $_POST['nombre'];
        $Marca = $_POST['marca'];
        $Precio = $_POST['precio'];
        $Foto = $_POST['foto'];
        $Desc = $_POST['desc'];

        $transaccion = new BaseDatos();

        $consulta = "UPDATE producto SET nombre='$Nombre', marca='$Marca', precio='$Precio', foto='$Foto', descripcion='$Desc' WHERE idProducto = '$Id'";

        $transaccion->actualizarDatos($consulta);

        header("Location: bodega.php");
    }

?>