<?php

//Verificar si vienen errores por get y mostrarlos
if (isset($msj)) {
    if (count($msj) > 0) {
        echo "<div class='alert alert-danger text-center'>";
        foreach ($msj as $key => $valor) {
            echo "<strong>* " . $valor . "</strong><br>";
        }
        echo "</div>";
    }
}
?>