<?php
    session_start();
    include('table_column.php');

    $table_name = $_SESSION['table'];
    $columns = $table_column_mapping[$table_name];

    

    $db_arr = [];
    $user = $_SESSION['username'];

    foreach ($columns as $column) {
        if (in_array($column, ['created_at', 'updated_at'])) {
            $db_arr[$column] = date('Y-m-d H:i:s');
        } else if ($column == 'created_by') {
            $db_arr[$column] = $user;
        } else if ($column == 'image') {
            // Upload or move the file to our directory
            $target_dir = "uploads/products/" ;
            $file_data = $_FILES[$column];

            
            $file_name = $file_data["name"];
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $file_name = 'image-' . time() . '.' . $file_ext;
            $check = getimagesize($file_data["tmp_name"]);
            if($check){
                if(move_uploaded_file($file_data["tmp_name"], $target_dir . $file_name)) {
                    $db_arr[$column] =$file_name;
                }
            } else {
                // Not move to the database
            }

            // Save the path to our database
        } else {
            $db_arr[$column] = isset($_POST[$column]) ? $_POST[$column] : "";
        }
        
    }
    // var_dump($db_arr);
    // die;
    
    //$table_properties = implode(", ", array_keys($db_arr));
    //$table_placeholders = ':' . implode(", :", array_keys($db_arr));
    
    $table_properties = implode(", ", array_keys($db_arr));
    $table_placeholders = implode(", ", array_fill(0, count($db_arr), '?'));


    
    //tabel products
    // $productName = isset($_POST['productName']) ? $_POST['productName'] :'';
    // $description = isset($_POST['description']) ? $_POST['description'] :'';
    // $created_by = $user;
    // $created_at = date('Y-m-d H:i:s');
    // $updated_at = date('Y-m-d H:i:s');

    //tabel user
    // $firstname = isset($_POST["firstname"]) ? $_POST["firstname"] : "";
    // $lastname = isset($_POST["lastname"]) ? $_POST["lastname"] : "";
    // $username = isset($_POST["username"]) ? $_POST["username"] : "";
    // $password = isset($_POST["password"]) ? $_POST["password"] : "";
    // $level = isset($_POST["level"]) ? strtolower($_POST["level"]) : "";
    // $encrypted = password_hash($password, PASSWORD_DEFAULT);

    // $command = "INSERT INTO  
    // $table_name (firstname, lastname, username, password, level) 
    // VALUES ('".$firstname."', '".$lastname."', '".$username."', '".$encrypted."', '".$level."')";

    // var_dump($db_arr);
    // die;

    // try {
    //     include('koneksi.php');
    //         $sql = "INSERT INTO $table_name ($table_properties) 
    //                     VALUES ($table_placeholders)";

    //         $stmt = $koneksi->prepare($sql);
    //         mysqli_query($stmt, $db_arr);   
    //         $response = [
    //             'success' => true,
    //             'message' => $firstname . ' '. $lastname .' Succesfully added',
    //         ];
    //         // Execute the query
    //     } catch (PDOException $e) {
    //         $response = [
    //             'success' => false,
    //             'message' => $e->getMessage()
    //         ];
    //     }

    try {
    include('koneksi.php');
    $sql = "INSERT INTO $table_name ($table_properties) VALUES ($table_placeholders)";
    $stmt = $koneksi->prepare($sql);

    if ($stmt) {
        // Bind parameters dynamically
        $types = ''; // Initialize an empty string for types
        $values = array(); // Create an array for values
        foreach ($db_arr as $param => $value) {
            $types .= 's'; // Assuming all values are strings; adjust if needed
            $values[] = $value;
        }
        
        // Insert types as the first parameter in the bind_param function
        array_unshift($values, $types);
        call_user_func_array(array($stmt, 'bind_param'), $values);

        // Execute the query
        $stmt->execute();

        $response = [
            'success' => true,
            'message' => 'Berhasil dimasukan ke dalam Database',
        ];
            } else {
                throw new Exception("Error in preparing the SQL statement");
            }
        } catch (Exception $e) {
            $response = [
                'success' => false,
                'message' => $e->getMessage()
            ];
        } finally {
            // Close the statement to free up resources
            if ($stmt) {
                $stmt->close();
            }
        }

    $_SESSION['response'] = $response;
    header('location: ./' . $_SESSION['redirect_to']);
?>