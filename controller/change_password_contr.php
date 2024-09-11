<?php
session_start();
require "../include/DB.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $old_password = $_POST['old_password'] ?? '';
    $new_password = $_POST['new_password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    $sql = "SELECT * FROM user WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_SESSION['user_email']]);
    $data = $stmt->fetchObject();

    if ($data) {
        $check = password_verify($old_password, $data->password);

        if ($check) {
            if ($new_password === $confirm_password) {
                $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
                $sql = "UPDATE user SET password = ? WHERE email = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$hashed_new_password, $_SESSION['user_email']]);
                
                    header("Location: ../index.php");
                    exit();
                }
                else {
                    $_SESSION['reset_error'] = "The passwords do not match";
                    header("Location: ../change_password.php");
                    exit();
                }
            } 
        } else {
            $_SESSION['not_right_password'] = "Enter the correct password";
            header("Location: ../change_password.php");
            exit();
        }
}
