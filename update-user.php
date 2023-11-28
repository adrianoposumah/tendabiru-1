<?php

    $data = $_POST;
    $user_id = (int) $data["userId"];
    $firstname = $data["f_name"];
    $lastname = $data["l_name"];
    $username = $data["username"];


    // try {
    //     include('koneksi.php');
    //         $command = 
    //         "UPDATE user SET user.username={$email}, user.lastName={$lastname}, user.firstName={$firstname}  WHERE id=($user_id)";
    //         mysqli_query($koneksi, $command);   

    //         echo json_encode([
    //             'success' => true,
    //             'message'=> 'User ' . $firstname .' ' . $lastname . ' Berhasil Diperbarui',
    //         ]);
    //     } catch (PDOException $e) {
    //         echo json_encode([
    //             'success' => false,
    //             'message'=> 'Gagal memproses permintaan',
    //         ]);
    //     }

    try {
    include('koneksi.php');

    // Use prepared statements to prevent SQL injection
    $command = $koneksi->prepare("UPDATE user SET username=?, lastName=?, firstName=? WHERE id=?");
    $command->bind_param("sssi", $username, $lastname, $firstname, $user_id);
    $command->execute();

    echo json_encode([
        'success' => true,
        'message'=> 'User ' . $firstname .' ' . $lastname . ' Berhasil Diperbarui',
    ]);
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message'=> 'Gagal memproses permintaan',
    ]);
}
?>