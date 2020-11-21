<?php

    include ('inc/baseDatos.php');

    if(isset($_POST['enviar']))
    {
        $nombre = $_POST['nombre'];
        $marca = $_POST['marca'];
        $precio = $_POST['precio'];
        $foto = $_POST['foto'];
        $desc = $_POST['desc'];

        $transaccion = new BaseDatos();

        $consulta = "INSERT INTO producto(nombre, marca, precio, foto, descripcion) VALUES ('$nombre', '$marca', '$precio', '$foto', '$desc')";

        $transaccion->agregarDatos($consulta);

        header("Location: index.html");
    }

?>