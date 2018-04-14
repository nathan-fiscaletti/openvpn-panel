<?php

session_start();

if (isset($_GET['logout']))
{
    unset($_SESSION['token']);
    unset($_SESSION['user']);
    header("Location: index.php");
    exit;
}

if ($_POST['username'] == 'MrFisc')
{
    if ($_POST['password'] == 'Nath@n51095n')
    {
        $_SESSION['user']  = $_POST['username'];
        $_SESSION['token'] = md5(date('Y.M.d').$_POST['username']);

        header("Location: index.php");
        exit;
    } else {
        header("Location: index.php?badlogin");
        exit;
    }
} else {
    header("Location: index.php?badlogin");
}

