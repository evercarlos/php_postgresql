<?php
/**
 * Created by PhpStorm.
 * User: ECR
 * Date: 26/04/2018
 * Time: 07:12 PM
 */

try {
    $link = require_once 'conecction.php';

    $id = $_REQUEST['id'];

    $sql = "SELECT * FROM entity WHERE id='" . $id . "'";

    $result = pg_query($link, $sql) or die('Error al buscar');
    $row = pg_fetch_row($result);
    $dat = [
        'id' => $row[0],
        'name' => $row[1],
        'dni' => $row[2]
    ];

    echo json_encode([
        'status' => true,
        'data' => $dat
    ]);
} catch (Exception $e) {
    echo json_encode([
        'status' => false
    ]);
}
