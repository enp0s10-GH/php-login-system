<?php
class Account {

    function login($username, $password) {
        include_once("db_conn.php");
        if(isset($username) && isset($password)) {
            if(isset($conn)) {
                $sql = $conn->prepare("SELECT * FROM users WHERE USERNAME=?");
                $sql->bind_param("s", $username);
                $sql->execute();
                $result = $sql->get_result();
                if($result->num_rows === 1) {
                    $row = $result->fetch_assoc();
                    if($row['PASSWORD'] === hash('sha256', $password)) {
                        session_start();
                        $_SESSION['USERNAME'] = $row['USERNAME'];
                        $_SESSION['ID'] = $row['ID'];
                        header("Location: dashboard.php");
                        return true;
                    } else {
                        header("Location: ../index.php?error=Invalid Password");
                        exit();
                    }
                } else {
                    header("Location: ../index.php?error=Invalid Username");
                    exit();
                }
            } else {
                header("Location: ../index.php?error=Error while connecting to Database");
                exit();
            }
        } else {
            header("Location: ../index.php?error=No Username or Password given");
            exit();
        }
    }

}

?>
