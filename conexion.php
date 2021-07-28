<!-- Conexión a la base de datos,
codificación de caracteres,
seleccion de base de datos. -->
<?php 


$conexion = new mysqli("localhost", "root", "") or  die("no conectado");

mysqli_set_charset($conexion,'utf8mb4');

mysqli_select_db($conexion,"gestion_bodega") or die("Base de Datos no encontrada </br>");


 ?>