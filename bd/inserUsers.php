<?php   
    require_once 'conexion.php';
    $u1="admin01";
    $p1=password_hash("1234", PASSWORD_DEFAULT);
    $r1="ADMINISTRADOR";
    $u2="docente01";
    $p2=password_hash("1234", PASSWORD_DEFAULT);
    $r2="DOCENTE";
    $u3="alumno01";
    $p3=password_hash("1234", PASSWORD_DEFAULT);
    $r3="ALUMNO";

    $insertusr = $conexion -> prepare("
        INSERT IGNORE INTO users (username, password, role) VALUES (?,?,?)
    ");
    $insertusr -> bind_param("sss",$u1,$p1,$r1);
    $insertusr -> execute();

    $insertusr -> bind_param("sss",$u2,$p2,$r2);
    $insertusr -> execute();

    echo "USUARIO CREADO CORRECTAMENTE";
?>