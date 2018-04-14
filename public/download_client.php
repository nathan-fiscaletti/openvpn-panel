<?php

chdir('../');

session_start();

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
        if (isset($_GET['user']))
        {
            $webconfig = include_once './config/WebConfig.php';
            $file = $webconfig['client_storage'].'/'.$_GET['user'].'.ovpn';
            if (file_exists($file)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename="'.basename($file).'"');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file));
                readfile($file);
                exit;
            } else {
                header('Location: index.php');
                exit;            
            }
        }         
    }
} else {
    header('Location: index.php');
    exit;
}