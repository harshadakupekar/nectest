<?php

$connection = mysqli_connect('localhost', 'username', 'password', 'database_name');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row && password_verify($password, $row['password'])) {
        
        session_start();
        $_SESSION['username'] = $username;

    
        header('Location: index.html');
    } else {
        echo "Invalid username or password";
    }
}
?>
