<?php

    class BaseDatos
    {
        public $usuario = "root";
        public $pass = "";

        public function __construct(){}

        public function Conectar()
        {
            try
            {
                $datos = "mysql:host=localhost;dbname=tiendaweb";
                $conectar = new PDO($datos, $this->usuario, $this->pass);
                return ($conectar);
            }
            catch(PDOExeption $error)
            {
                echo ($error->getMessage());
            }
        }

        public function agregarDatos($consulta)
        {
            $conectar=$this->Conectar();

            $consultaAgregarDatos=$conectar->prepare($consulta);

            $ejecutar=$consultaAgregarDatos->execute();

            if(!$ejecutar)
            {
                echo("Error insertando los datos");
            }
        }

        public function consultarDatos($consulta)
        {
            $conectar=$this->Conectar();

            $consultarDatos=$conectar->prepare($consulta);

            $consultarDatos->setFetchMode(PDO::FETCH_ASSOC);

            $ejecutar=$consultarDatos->execute();

            return ($consultarDatos->fetchAll());
        }

        public function eliminarDatos($consulta)
        {
            $conectar=$this->Conectar();

            $eliminarDatos=$conectar->prepare($consulta);

            $ejecutar=$eliminarDatos->execute();

            if(!$ejecutar)
            {
                echo("Error eliminando los datos");
            }
        }

        public function actualizarDatos($consulta)
        {
            $conectar=$this->Conectar();

            $actualizarDatos=$conectar->prepare($consulta);

            $ejecutar=$actualizarDatos->execute();

            if(!$ejecutar)
            {
                echo("Error al actualizar datos");
            }
        }
    }


?>