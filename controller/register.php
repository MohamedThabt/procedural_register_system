<?php

session_start();
require "../include/DB.php";
        // check request method and submition
if($_SERVER['REQUEST_METHOD'] == 'POST' &&isset( $_POST['submit'])){
    // validate inputs trim to remove white space
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars(trim($_POST['phone']));
    $hashed_Password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // instert in to Database
    $sql = "INSERT INTO user (name , email , phone , password) VALUES (?,?,?,? )";

    $stmt = $pdo ->prepare($sql);
    $stmt ->execute([$name ,$email ,$phone,$hashed_Password]);


    $_session['success'] = "hello " . $name ;




     // return object of stmt has has all info about that email
     $data = $stmt ->fetchObject();
      // store user info in session to us it any where 
      $_SESSION['user_id'] = $data->id;
      $_SESSION['user_name'] = $data->name;
      $_SESSION['user_email'] = $data->email;
      $_SESSION['user_phone'] = $data->phone;
      $_SESSION['login_done'] = "Hello " .$data->name ;
    // redirect to Show data if it is admin

}
header ("location:../login.php");