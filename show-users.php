<?php 
    include('koneksi.php');

    // $stmt = $koneksi->prepare('SELECT * FROM user');
    // $stmt->execute();
    // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    // var_dump($stmt->fetchAll());

    $query = 'SELECT * FROM user';
    $result = $koneksi->query($query);

    if ($result === false) {
    die("Error in the query: " . $koneksi->error);
    }

    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;

    ?>