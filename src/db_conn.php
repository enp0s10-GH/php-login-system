<?php
include("../config/config.php");
if(isset($db_config)) {
    $db_name = $db_config['DB_NAME'];
    $db_host = $db_config['DB_HOST'];
    $db_user = $db_config['DB_USER'];
    $db_pass = $db_config['DB_PASS'];
    $db_port = $db_config['DB_PORT'];

    # Establishing connection with Database
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port);

    if($conn->connect_errno) {
        error_log('Connection error:' . $conn->connect_errno);
    }
} else {
    echo "Error while loading config.";
}
?>


