<?php

$connection = mysqli_connect('localhost', 'username', 'password', 'database_name');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    
    $profile_picture = $_FILES['profile_picture']['name'];
    $profile_picture_tmp = $_FILES['profile_picture']['tmp_name'];
    move_uploaded_file($profile_picture_tmp, "uploads/$profile_picture");

    
    $query = "INSERT INTO users (username, password, profile_picture) VALUES ('$username', '$hashed_password', '$profile_picture')";
    mysqli_query($connection, $query);

    
    header('Location: index.html');
}
?>
