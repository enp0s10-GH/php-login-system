<?php
session_start();
include("account.php");
if(!isset($_SESSION['USERNAME'])) {
    if(isset($_POST['USERNAME']) && isset($_POST['PASSWORD'])) {
        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $password = validate($_POST['PASSWORD']);
        $username = validate($_POST['USERNAME']);
        $account = new Account();
        $result = $account->login($username, $password);
    }
} else {
    header("Location: dashboard.php?message=Succesfully logged in");
}