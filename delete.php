<?php

    $data = $_POST;
    //$p_id = (int) $data["id"];
    //$table = $data["table"];
    $p_id = isset($data["id"]) ? (int)$data["id"] : 0;
    $table = isset($data["table"]) ? $data["table"] : '';
    //$firstname = $data["f_name"];
    //$lastname = $data["l_name"];
    error_log("Table: " . $table);


    if($table=="user") {
        $cid_name = "id";
    } else if($table== "products") {
        $cid_name = "productId";
    } else {

    }

    

    try {
        include('koneksi.php');
            $command = "DELETE FROM $table WHERE $cid_name=($p_id)";
            mysqli_query($koneksi, $command);   

            echo json_encode([
                'success' => true,
            ]);
        } catch (PDOException $e) {
            echo json_encode([
                'success' => false,
            ]);
        }