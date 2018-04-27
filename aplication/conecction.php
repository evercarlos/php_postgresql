<?php
$link = pg_connect('host=localhost port=5432 dbname=dbphpPostgresql user=postgres password=123456') or die("Error de Conexion");
return $link;
?>