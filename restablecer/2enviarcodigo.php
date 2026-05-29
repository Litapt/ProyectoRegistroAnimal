<?php
//Recibe CURP y correo. Busca en trabajadores. Si existe, genera código. Guarda código hasheado y fecha de expiración. Envía correo. Redirige a verificarCodigo.php.
    header('Location: 3verificarCodigo.php');
?>