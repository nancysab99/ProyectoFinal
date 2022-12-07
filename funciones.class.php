<?php
class funciones 
{
    var $mysqli;

    function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
    }

    function openModule($idmodulo)
    {
        if (file_exists("modulos/$idmodulo.php")){
            require "modulos/$idmodulo.php";
        } else {
            echo "<img src='https://www.gstatic.com/youtube/src/web/htdocs/img/monkey.png'";
            
        }

    }
    function login($idusuario, $password){ 
        $strsql = "SELECT usuario, contraseña FROM usuarios where idusuario=?"; 
        if($stmt = $this->mysqli->prepare($strsql)){ 
            $stmt->bind_param("s", $idusuario); 
            $stmt->execute(); 
            if($stmt->errno == 0){ 
            $stmt->store_result(); 
            $stmt->bind_result($usuario, $passwdb); 
            $stmt->fetch(); 
            if($stmt->num_rows ==1){ 
                if($password == $passwdb){ 
                    $id = session_id(); 
                    $navegador = $_SERVER['HTTP_USER_AGENT']; 
                    $_SESSION["idusuario"] = $idusuario; 
                    $_SESSION["usuario"] = $usuario; 
                    $_SESSION["login_string"] = $password.$navegador.$id; 
                    return true; 
                }else{ 
                    return false; 
                } 
            }else{ 
                return false; 
            } 
            }else{ 
                return false; 
            } 
        }else{ 
            return false; 
        } 
    } 
    function login_check(){ 
        if(isset($_SESSION["idusuario"], $_SESSION["usuario"], $_SESSION["login_string"])){ 
            $idusuario = $_SESSION["idusuario"]; 
            $usuario = $_SESSION["usuario"]; 
            $loginstring = $_SESSION["login_string"]; 
            $navegador = $_SERVER['HTTP_USER_AGENT']; 
            $id = session_id(); 
            $strsql = "SELECT contraseña FROM usuarios WHERE idusuario=?"; 
            if($stmt = $this->mysqli->prepare($strsql)){ 
                $stmt->bind_param("s", $idusuario); 
                $stmt->execute(); 
                if($stmt->errno == 0){ 
                    $stmt->store_result(); 
                    if($stmt->num_rows == 1){ 
                        $stmt->bind_result($password); 
                        $stmt->fetch(); 
                        $login_check = $password.$navegador.$id; 
                        if($login_check == $loginstring){ 
                            return true; 
                        }else{ 
                            return false; 
                        } 
                    }else{ 
                        return false; 
                    } 
                }else{ 
                    return false; 
                } 
            }else{ 
                return false; 
            } 
 
        }else{ 
            return false; 
        } 
    } 
    function iniciarsesion(){ 
        session_name("desarrollo_aplicaciones"); 
        session_start(); 
    } 
}
?>