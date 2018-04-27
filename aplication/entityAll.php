<?php
try {
    $link = require_once 'conecction.php';

    $sql = "SELECT * FROM entity ORDER BY id ASC ";
    $result = pg_query($link, $sql) or die('Error al seleccionar la base de datos');
    $dat = [];
    if (pg_num_rows($result) > 0) {
        while ($row = pg_fetch_array($result)) {
            $dat[] = [
                'id' => $row['id'],
                'name' => $row['name'],
                'dni' => $row['dni']
            ];
        }
    } else {
        $dat = [];
        // throw new \Exception('No hay ningun dato');
    }

    echo json_encode([
        'status' => true,
        'data' => $dat
    ]);
} catch (Exception $e) {
    echo json_encode([
        'status' => false,
        'message' => $e->getMessage()
    ]);
}
?>