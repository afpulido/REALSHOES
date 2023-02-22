<?php
session_start();
if(session_destroy()){
    echo "
        <script>alert('Cierre de Sesión exitoso');
            window.location = '../index.php';    
        </script>
    ";
}
?>