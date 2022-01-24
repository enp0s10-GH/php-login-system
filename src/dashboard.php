<?php
session_start();
if(isset($_SESSION['USERNAME']) && isset($_SESSION['ID'])) {
?>
<html>

You logged in!

</html>
<?php
} else {
    header("Location: ../index.php?error=You need to be logged in!");
    exit();
}