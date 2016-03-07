<?php
session_start();
if($_SESSION['loggedIn'] == 1)
{
    echo '<li><a href="dashboard.php">Dashboard</a></li>';
    echo '<li><a href="logout.php">Logout</a></li>';
}
else
{
    echo '<li><a href="createAccount.php">Create Account</a></li>';
    echo '<li><a href="login.php">Login</a></li>';
}
?>
