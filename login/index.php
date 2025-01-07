<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'config.php'; 

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, name, email, password FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
         
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_email'] = $row['email'];
         

        
            header("Location: ../index.php");
            exit;
        } else {
            echo "<script>alert('Invalid password. Please try again.');
                  window.location.href = 'login.php';
                  </script>";
        }
    } else {
       
        echo "<script>alert('No user found with this email.');
              window.location.href = 'login.php';
              </script>";
    }

    $stmt->close();
    $conn->close();
}
?>