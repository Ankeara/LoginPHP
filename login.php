<?php

session_start();
include('db.php');

if(isset($_POST['email']) && isset($_POST['password']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $password = md5($password);
    $sql = "SELECT * from testing where email = '$email' AND password = '$password'";
    $sqlQuery = mysqli_query($conn,$sql);
    if(mysqli_num_rows($sqlQuery) === 1)
    {
        $row = mysqli_fetch_array($sqlQuery);
        if($row['email'] === $email && $row['password'] === $password)
        {
            $_SESSION['id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['password'] = $row['password'];
            header('Location: ./home.php?login=success');
        }else{
            header('Location: ./authlogin.php?login=failed');
        }
    }else{
        header('Location: ./authlogin.php?login=not_exit');
    }
}else{
        header('Location: ./authlogin.php?login=failed');
}