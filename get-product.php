<?php
$id = $_GET['productId'];

include('koneksi.php');

    $query = "SELECT * FROM products WHERE productId=$id";
    $result = $koneksi->query($query);

    if ($result === false) {
    die("Error in the query: " . $koneksi->error);
    }

    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    echo json_encode($data[0]);

