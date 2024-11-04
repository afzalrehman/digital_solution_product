<?php
include_once("config.php");
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

session_start();

function userAdd()
{
    global $conn;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $age = (int) $_POST['age'];
        $products_file = $_FILES['products_file']['name'];
        $file_ext = pathinfo($products_file, PATHINFO_EXTENSION);
        $allowed_ext = ['xls', 'csv', 'xlsx'];

        if (empty($name) || empty($email) || empty($age) || empty($products_file)) {
            echo "All fields are required.";
            return;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format.";
            return;
        }

        
        $sql = "INSERT INTO users (name, email, age) VALUES ('$name', '$email', $age)";
        if (mysqli_query($conn, $sql)) {
            $user_id = mysqli_insert_id($conn);  

            if (in_array($file_ext, $allowed_ext)) {
                $inputFileNamePath = $_FILES['products_file']['tmp_name'];

                try {
                    $spreadsheet = IOFactory::load($inputFileNamePath);
                    $data = $spreadsheet->getActiveSheet()->toArray();
                    $count = 0;
                    foreach ($data as $row) {
                        if ($count > 0) {  
                            $product_name = mysqli_real_escape_string($conn, $row[0]);
                            $quantity = (int) $row[1];
                            $price = (float) $row[2];

                            $product_sql = "INSERT INTO products (product_name, quantity, price, user_id) 
                        VALUES ('$product_name', $quantity, $price, $user_id)";
                            mysqli_query($conn, $product_sql);
                        }
                        $count++; 
                    }


                    $_SESSION['success'] = "$name User and Products Added Successfully";
                    header('Location:./user.php');
                    exit();
                } catch (Exception $e) {
                    echo "Error processing Excel file: " . $e->getMessage();
                }
            } else {
                echo "Invalid file type. Only Excel files are allowed.";
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
