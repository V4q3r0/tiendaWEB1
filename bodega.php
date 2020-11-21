<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bodega</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/bodega.css">
    <link rel="stylesheet" href="css/formModal.css">
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">
                <a href="index.html"><img src="img/logo.jpg" alt="Logo principal"></a>
            </div>
            <nav>
                <a href="index.html">Inicio</a>
                <a href="index.html">Administración</a>
                <a href="bodega.php">Bodega</a>
                <a href="#">Contacto</a>
            </nav>
        </header>
        
        <?php

            include ("inc/baseDatos.php");

            $transaccion = new BaseDatos();

            $consulta = "SELECT * FROM producto WHERE 1";

            $resultado = $transaccion->consultarDatos($consulta);

        ?>

        <div class="box">
            
            <div class="row">

                <?php foreach($resultado as $resultados): ?>

                    <div class="arriba">
                        <div class="nom">
                            <p><?php echo $resultados['nombre']; ?></p>
                        </div>
                        <img src="<?php echo $resultados['foto']; ?>" alt="imagen del producto">
                        <div class="valor">
                            <p><b>$ </b><?php echo $resultados['precio']; ?></p>
                        </div>
                        <div class="datos">    
                            <p id="desc"><?php echo $resultados['descripcion']; ?></p>
                        </div>
                        <div class="btn">
                            <button id="blue" onclick="document.getElementById('Modal<?php echo($resultados['idProducto']); ?>').style.display='block'">Editar</button>
                            <a id="red" href="eliminarDatos.php?id=<?php echo($resultados['idProducto']) ?>">Eliminar</a>
                        </div>
                        <div id="Modal<?php echo($resultados['idProducto']); ?>" class="editar">

                                <form action="actualizarDatos.php?id=<?php echo($resultados['idProducto']); ?>" method="POST">

                                <div class="contenedor">
                                    <span onclick="document.getElementById('Modal<?php echo($resultados['idProducto']); ?>').style.display='none'"
                                    class="close" title="Cerrar Modal">&times;</span>
                                    <div class="titulo">
                                        <h2>Editar datos</h2>
                                    </div>
                                    <div class="editDatos">
                                        <label for="nombre">Nombre:</label>
                                        <input class="id" type="text" name="nombre" placeholder="Nombre: " value="<?php echo ($resultados['nombre']); ?>">
                                        <label for="marca">Marca:</label>
                                        <input class="id" type="text" name="marca" placeholder="Marca: " value="<?php echo ($resultados['marca']); ?>">
                                        <br><br>
                                        <label for="precio">Precio:</label>
                                        <input class="id" type="text" name="precio" placeholder="Precio: " value="<?php echo ($resultados['precio']); ?>">
                                        <label for="foto">URL/imagen:</label>
                                        <input class="id" type="text" name="foto" placeholder="URL/imagen: " value="<?php echo ($resultados['foto']); ?>">
                                        <br><br>
                                        <label for="desc">Descripción:</label>
                                        <input class="id2" type="text" name="desc" placeholder="Descripción: " value="<?php echo($resultados['descripcion']); ?>">
                                        <br><br>
                                        <input type="submit" value="Actualizar" name="btnEditar">
                                    </div>
                                </div>

                                </form>

                            </div>
                    </div>


                <?php endforeach?>

            </div>

        </div>

        <div class="pie">
            <footer>
                <p>&copy; Todos los derechos reservados.</p>
            </footer>
        </div>
    </div>
</body>
</html>