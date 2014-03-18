<?php
session_start();
require_once 'funciones_bd.php';
require_once 'funciones.php';

    /* se o ID (gardado en variable de sesión) existe, é dicir, se nesa variable de sesión
     * hai algo... pois utilizámola, se non poñemos 0 
     */
    $_SESSION['id'] = (isset($_SESSION['id']))?
            $_SESSION['id']:0;
    
    echo $_SESSION['id'];
    $db = conectaBd();
     
    $consulta = "DELETE FROM software WHERE id = :id ";
    $resultado = $db->prepare($consulta);
    
    /*
     * o DELETE de 0 daría ERRO porque non hai ningún ID=0 polo que mandariamos un errp
     * en caso contrario BORRARIAMOS
     * 
     */
    
    if ($resultado->execute(array(":id" => $_SESSION['id']))) {
            unset($_SESSION['id']);
            $url = "listado_software.php";
            header('Location:'.$url);
    } else {
        $url = "error.php?msg_error=Error_Eliminar_Software";
        header('Location:'.$url);
    }

    $db = null;


?>