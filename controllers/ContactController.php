<?php
class ContactController
{
     // Function to display the contact form
     public function contact()
     {
          include_once 'views/contact.php';
     }

     // Function to handle form submission
     public function submit()
     {
          // Check if the form is submitted via POST method
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
               // Sanitize input data
            
               $email = $_POST['email'];
               $phone = $_POST['phone'];
               $address = $_POST['dia_chi'];  // New address field
               $message = $_POST['message'];

               // Validate inputs
               if ( empty($email) || empty($phone) || empty($address) || empty($message)) {
                    $error = "Vui lòng điền đầy đủ thông tin!";
                    include_once 'views/contact.php';
                    return;
               }
               
               // Connect to the database (make sure your env file or connection settings are correct)
               $conn = new mysqli('localhost', 'root', '', 'db_du_an');

               // Check connection
               if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
               }

               // Insert data into the database
               $sql = "INSERT INTO lien_hes (email, so_dien_thoai, dia_chi, noi_dung, trang_thai_lh) 
                       VALUES ('$email', '$phone', '$address', '$message','0')";

               if ($conn->query($sql) === TRUE) {
                    // Success message
                    $success = "Cảm ơn bạn $address! Chúng tôi sẽ liên hệ với bạn sớm nhất.";
               } else {
                    // Error handling
                    $error = "Có lỗi xảy ra: " . $conn->error;
               }

               // Close the database connection
               $conn->close();

               // Reload the contact form view with success or error message
               include_once 'views/contact.php';
          }
     }
}
