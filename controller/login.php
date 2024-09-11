<?php

session_start();
require "../include/DB.php";
        // check request method and submition
if($_SERVER['REQUEST_METHOD'] == 'POST' &&isset( $_POST['submit'])){
    // validate inputs trim to remove white space
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $Password = $_POST['password'];

    // check that email in Database or not
    $sql = "SELECT * FROM user WHERE email = ?";

    $stmt = $pdo ->prepare($sql);
    $stmt ->execute([$email]);
    // return object of stmt has has all info about that email
    $data = $stmt ->fetchObject();

if($data){

    // check password verify by password_verify function // didn't compare passord directily it's compare algorithm
    $check = password_verify($Password, $data->password); 

    if($check){
        // store user info in session to us it any where 
        $_SESSION['user_id'] = $data->id;
        $_SESSION['user_name'] = $data->name;
        $_SESSION['user_email'] = $data->email;
              // Check if phone exists before storing in session
              if (isset($data->phone)) {
                $_SESSION['user_phone'] = $data->phone;
            }
            
        $_SESSION['login_done'] = "Hello " .$data->name ;
        

        // redirect to home page
        header ("location:../index.php");
    }
    else{

        $_SESSION['password_error']= "pleas write correct password";
        header ("location:../login.php");
    }

}
else{
    $_SESSION['error'] = "this email didn't register before pleas go to register page";
    header ("location:../login.php");
}



}