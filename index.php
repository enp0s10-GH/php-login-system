<?php
session_start();
if(!isset($_SESSION['USERNAME']) && !isset($_SESSION['ID'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login-System</title>
    <link rel="stylesheet" type="text/css" href="src/css/style.css">
</head>
<body>
<div class="login-form">
    <?php if(isset($_GET['error'])) { echo "<p id='error'>" . $_GET['error'] . "</p>"; } ?>
    <h1 id="login-form-topic">Login</h1>
    <form method="post" action="src/login.php" autocomplete="off">
        <input type="text" name="USERNAME" placeholder="Username" required autofocus />
        <br>
        <input type="password" name="PASSWORD" placeholder="Password" required />
        <br>
        <input type="submit" name="submit" value="Submit" />
        <span id="no-account">No account? <a href="src/register_account.php">Create one</a></span>

    </form>
</div>
</body>

</html>
<?php
} else {
    header("Location: src/dashboard.php");
    exit();
}