<?php
include('koneksi.php');

try {
    $productName = $_POST['productName'];
    $description = $_POST['description'];
    $productId = $_POST['productId'];

    $target_dir = "uploads/products/";
    $file_name_value = NULL;
    $file_data = $_FILES['image'];

    if ($file_data['tmp_name'] !== '') {
        $file_name = $file_data["name"];
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $file_name = 'image-' . time() . '.' . $file_ext;
        $check = getimagesize($file_data["tmp_name"]);
        if ($check) {
            if (move_uploaded_file($file_data["tmp_name"], $target_dir . $file_name)) {
                $file_name_value = $file_name;
            }
        }
    }

    var_dump($productName);
    var_dump($description);
    var_dump($productId);
    var_dump($file_name_value);

    if ($file_name_value !== NULL) {
        // Jika ada file yang diunggah, termasuk kolom 'image' dalam UPDATE
        $sql = "UPDATE products 
                SET productName=?, description=?, image=?, updated_at=NOW()
                WHERE productId=?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param('sssi', $productName, $description, $file_name_value, $productId);
    } else {
        // Jika tidak ada file yang diunggah, exclude kolom 'image' dari UPDATE
        $sql = "UPDATE products 
                SET productName=?, description=?, updated_at=NOW()
                WHERE productId=?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param('ssi', $productName, $description, $productId);
    }

    $stmt->execute();

    $response = [
        'success' => true,
        'message' => 'Berhasil diperbarui ke dalam Database',
    ];

} catch (Exception $e) {
    $response = [
        'success' => false,
        'message' => 'Gagal diperbarui ke dalam Database',
    ];
}

// Close the statement and connection
if (isset($stmt)) {
    $stmt->close();
}
$koneksi->close();

// Return the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
exit();
