<?php
    include_once('./model/user_model.php');
    if(isset($_POST['username']) && isset($_POST['password'])){
        $user_model = new User();

        $parametros = array(
            "username" => $_POST['username'],
            "password" => $_POST['password']
        );

        $res = $user_model->validarUsuario($parametros);

        if(!$res){
            echo 0;
        }else{
            echo json_encode($res, JSON_UNESCAPED_UNICODE);
        }
    }else{
        header('Location: ../public/login.html');
    }
?>