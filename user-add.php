<?php
    session_start();
  
    $table_name = $_SESSION['table'];

    // $firstname = $_POST["firstname"];
    // $lastname = $_POST["lastname"];
    // $username = $_POST["username"];
    // $password = $_POST["password"];
    // $level = $_POST["level"];
    // $encrypted = password_hash($password, PASSWORD_DEFAULT);

    $firstname = isset($_POST["firstname"]) ? $_POST["firstname"] : "";
    $lastname = isset($_POST["lastname"]) ? $_POST["lastname"] : "";
    $username = isset($_POST["username"]) ? $_POST["username"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    $level = isset($_POST["level"]) ? strtolower($_POST["level"]) : "";
    $encrypted = password_hash($password, PASSWORD_DEFAULT);

    // $command = "INSERT INTO  
    // $table_name (firstname, lastname, username, password, level) 
    // VALUES ('".$firstname."', '".$lastname."', '".$username."', '".$encrypted."', '".$level."')";

    try {
        include('koneksi.php');
            $command = "INSERT INTO $table_name (firstname, lastname, username, password, level) 
                        VALUES ('$firstname', '$lastname', '$username', '$password', '$level')";


            mysqli_query($koneksi, $command);   
            $response = [
                'success' => true,
                'message' => $firstname . ' '. $lastname .' Succesfully added',
            ];
            // Execute the query
        } catch (PDOException $e) {
            $response = [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }

    $_SESSION['response'] = $response;
    header('location: ./usermanagement.php');

?>