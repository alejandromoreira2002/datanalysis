<?php
    include_once(dirname(__DIR__,1).'/db/db.php');
    
    class User
    {
        private $db;

        public function __construct(){
            $this->db = new db();
        }
        
        public function validarUsuario($params){
            $sql = "SELECT * FROM usuarios WHERE usuario = '".$params['username']."';";
            $usuario = $this->db->getDatos($sql);

            if(!$usuario){
                return false;
            }else{
                $hashedPassword = $usuario[0]['contraseña'];
                $password = $params['password'];
                if (password_verify($password, $hashedPassword)) {
                    return $usuario;
                }else{
                    return false;
                }
            }
        }

        public function registrarUsuario($params){
            $username = $params['username'];
            $email = $params['email'];
            $rol = $params['rol'];

            $password = $params['password'];
            $hashed_pass = password_hash($password, PASSWORD_BCRYPT);

            $sql = "INSERT INTO usuarios (usuario, email, contraseña, rol) VALUES ('$username', '$email', '$hashed_pass', '$rol');";
            $this->db->registrarDatos($sql);
            return 1;
        }

        /*
        $fecha_actual = date("h:i:s");
        if($_POST['access'] == "1" && isset($_POST['email']) && isset($_POST['password'])){
            file_put_contents('log.txt', '['.$fecha_actual.'] Ocurrió un problema en la consulta de datos. Email: '.$email.'. Contraseña: '.$password.'.'.PHP_EOL.'', FILE_APPEND);
        }else{
            file_put_contents('log.txt', '['.$fecha_actual.'] Alguien intentó acceder sin datos'.PHP_EOL.'', FILE_APPEND);
            header('Location: index.php');
        }
        */

    }
?>