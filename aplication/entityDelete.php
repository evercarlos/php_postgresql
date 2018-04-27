<?php
/**
 * Created by PhpStorm.
 * User: ECR
 * Date: 26/04/2018
 * Time: 07:22 PM
 */

try {
    $link = require_once 'conecction.php';
    $id = $_REQUEST['id'];

    $sql = "DELETE FROM entity WHERE id= '" . $id . "'";

    pg_query($link, $sql) or die('Error al eliminar');

    echo json_encode([
        'status' => true
    ]);
} catch (Exception $e) {
    echo json_encode([
        'status' => false
    ]);
}