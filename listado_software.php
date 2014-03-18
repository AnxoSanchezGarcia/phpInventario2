<?php require_once 'funciones_bd.php'; ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Software</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <div>Listado de Software</div>
        <div><a href="formulario_nuevo_software.php">Nuevo Equipo</a></div>
        <?php
            /**
             * Como en phpInventario
             * facemos a conexión coa base de datos
             * executamos a consulta como a mostra
             * se NON hai erro imprimimos nunha táboa os valores
             * se non, devolvemos un erro
             * engadimos un campo EDITAR onde poderemos MODIFICAR os datos do software!
             */

            $bd = conectaBd();
            $consulta = "SELECT * FROM software";
            $resultado = $bd->query($consulta);
            if (!$resultado) {
                echo "Error en la consulta";
            } else {
                echo "<table border=1>";
                echo "<tr>";
                echo "<th>Titulo</th>";
                echo "<th>URL</th>";
                echo "<th></th>";
                echo "<th></th>";
                echo "</tr>";
                foreach($resultado as $registro) {
                    echo "<tr>";
                    echo "<td>".$registro['titulo']."</td>";
                    echo "<td><a href=".$registro['url'].">".$registro['url']."</a></td>";
                    echo "<td>";
                    $destino="formulario_editar_software.php?id=".$registro['id'];
                    echo "<a href=".$destino.">Editar</a></td>";
                    echo "</td>";
                    echo "<td>";
                    $destino="confirmar_eliminar_software.php?id=".$registro['id'];
                    echo "<a href=".$destino.">Eliminar</a></td>";    /* AQUÍ edítase */                
                    echo "</td>";          
                }
                echo "</table>";
            }
            
            $bd = null;
        ?>   
    </body>
</html>