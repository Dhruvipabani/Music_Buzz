<?php
    include 'connectivity.php';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sub = $_POST['subject'];
    $msg = $_POST['massage'];  
    
    if (!empty($msg)) { 
        $q = mysqli_query($con, "INSERT INTO contactus (name, email, subject, massage)
            VALUES ('$name', '$email', '$sub', '$msg')");
        
        echo '
            <script>
                alert("Message sent successfully.");
                location="../index.php";
            </script>';
    } else {
        echo '
            <script>
                alert("Message cannot be empty.");
                window.location="../contact/contact.php";
            </script>';
    }
?>
