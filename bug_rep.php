<?php
    $reporte=$_POST["reporte"];
    $prioridad=$_POST["prioridad"];
    $server_name="127.0.0.1";
    $username = "root";
    $password = "";
    $database_name="drumroll";

    $conexion = mysqli_connect($server_name, $username, $password, $database_name);
    $query = "insert into bugs (reporte, prioridad) values('$reporte', '$prioridad');";
    $resultado=mysqli_query($conexion, $query);
    header("Location: ../inicio/drumroll_incio.html");
?>