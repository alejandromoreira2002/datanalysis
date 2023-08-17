<?php
    include_once('./model/user_model.php');
    if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['rol'])){
        $user_model = new User();

        $parametros = array(
            "username" => $_POST['username'],
            "email" => $_POST['email'],
            "password" => $_POST['password'],
            "rol" => $_POST['rol']
        );

        $res = $user_model->registrarUsuario($parametros);

        if(!$res){
            echo 0;
        }else{
            echo "Se realizó con exito la inserción";
        }
    }else{
        header('Location: ../public/register.html');
    }
?>