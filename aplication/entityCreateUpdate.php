<?php
/**
 * Created by PhpStorm.
 * User: ECR
 * Date: 26/04/2018
 * Time: 10:38 PM
 */
try {
    $link = require_once 'conecction.php';

    $id = $_REQUEST['id'];
    $name = $_REQUEST['name'];
    $dni = $_REQUEST['dni'];
    if ($id != 0) {
        $sql = "UPDATE entity SET dni= '" . $dni . "', name='" . $name . "' WHERE id='" . $id . "' ";
    } else {
        $sql = "INSERT INTO entity(name,dni) VALUES('" . $name . "','" . $dni . "')";
    }
    pg_query($link, $sql) or die("Error al insertar");
    echo json_encode([
        'status' => true
    ]);
} catch (Exception $e) {
    echo json_encode([
        'status' => false
    ]);
}
