<?php

    $data = $_POST;
    $user_id = (int) $data["userId"];
    $firstName = $data["f_name"];
    $lastName = $data["l_name"];
    $username = $data["username"];


    // try {
    //     include('koneksi.php');
    //         $command = 
    //         "UPDATE user SET user.username={$email}, user.lastName={$lastName}, user.firstName={$firstName}  WHERE id=($user_id)";
    //         mysqli_query($koneksi, $command);   

    //         echo json_encode([
    //             'success' => true,
    //             'message'=> 'User ' . $firstName .' ' . $lastName . ' Berhasil Diperbarui',
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
    $command->bind_param("sssi", $username, $lastName, $firstName, $user_id);
    $command->execute();

    echo json_encode([
        'success' => true,
        'message'=> 'User ' . $firstName .' ' . $lastName . ' Berhasil Diperbarui',
    ]);
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message'=> 'Gagal memproses permintaan',
    ]);
}
?>