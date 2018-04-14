<?php

chdir('../');

session_start();

include_once './vendor/autoload.php';

use OpenVpnPanel\Control\Commands;

function authenticate_token($username, $token)
{
    return $token == md5(date('Y.M.d').$username);
}

if (! empty($_SESSION['user']) && ! empty($_SESSION['token']))
{
    if (! authenticate_token($_SESSION['user'], $_SESSION['token']))
    {
        unset($_SESSION['user']);
        unset($_SESSION['token']);
        header('Location: index.php');
        exit;
    } else {
        if (isset($_GET['client']))
        {
            $result = Commands::DeleteClient($_GET['client']);
            if ($result === 1) {
                header("Location: index.php?section=list_clients&deleted=1");
                exit;
            } else {
                header("Location: index.php?section=list_clients&deleted=0");
                exit;
            }
        } else {
            header('Location: index.php');
            exit;
        }  
    }
} else {
    header('Location: index.php');
    exit;
}