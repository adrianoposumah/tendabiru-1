<?php

    $data = $_POST;
    $user_id = (int) $data["user_id"];
    $firstname = $data["f_name"];
    $lastname = $data["l_name"];

    try {
        include('koneksi.php');
            $command = "DELETE FROM user WHERE id=($user_id)";
            mysqli_query($koneksi, $command);   

            echo json_encode([
                'success' => true,
                'message'=> 'User ' . $firstname .' ' . $lastname . ' Berhasil Dihapus',
            ]);
        } catch (PDOException $e) {
            echo json_encode([
                'success' => false,
                'message'=> 'Gagal memproses permintaan',
            ]);
        }