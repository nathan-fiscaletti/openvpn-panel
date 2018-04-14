<?php

session_start();

if (isset($_GET['logout']))
{
    unset($_SESSION['token']);
    unset($_SESSION['user']);
    header("Location: index.php");
    exit;
}

if (! file_exists('./users.json')) {
    header("Location: index.php?badlogin");
    exit;
}

$users = json_decode(file_get_contents('./users.json'), true);

echo $_POST['password'];
echo $users[$_POST['user']]['password'];
exit;

if (md5($_POST['password']) == $users[$_POST['user']]['password']) {
    $_SESSION['user']  = $_POST['username'];
    $_SESSION['token'] = md5(date('Y.M.d').$_POST['username']);

    header("Location: index.php");
    exit;
} else {
    header("Location: index.php?badlogin");
    exit;
}

