<?php
    class db{
        private $user;
        private $password;
        private $server;
        private $db;
        
        function __construct(){
            if(!file_exists('./configdb.ini'))
            {
                header('Location: ../public/error_conexion.html');
            }else{
                $datosDB = file_get_contents('./db/configdb.ini');
                $datosDB= explode("\n", $datosDB);    	
                $this->user = trim($datosDB[0]);
                $this->password = trim($datosDB[1]) == "no_data" ? "" : null; //$resultado = $condicion ? 'verdadero' : 'falso';
                $this->server =  trim($datosDB[2]);
                $this->db = trim($datosDB[3]);
            }
        }

        public function conexion(){
            $conn = new mysqli($this->server, $this->user, $this->password, $this->db);
            if(!$conn){
                echo mysqli_error($conn);
                return false;
            }else{
                return $conn;
            }
        }

        public function getDatos($sql){
            $conn = $this->conexion();
            $resultado = mysqli_query($conn, $sql);
            if(!$resultado)
            {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                return false;
            }
            $datos = array();
            while ($row = mysqli_fetch_assoc($resultado)) {
                $datos[] = $row;
            }
            mysqli_close($conn);
            return $datos;
        }

        public function registrarDatos($sql){
            $conn = $this->conexion();
            
            if(!$conn) echo "No se pudo conectar a la BD";
            mysqli_query($conn, $sql);
            mysqli_close($conn);
        }
    }
?>