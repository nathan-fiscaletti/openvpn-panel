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
            header("Location: /?section=login");
            exit;
        } else {
            if (isset($_GET['action'])) 
            {
                if ($_GET['action'] == 'start')
                {
                    Commands::StartServer();
                    header("Location: /?section=server_information");
                    exit;
                } else if ($_GET['action'] == 'stop') {
                    Commands::StopServer();
                } else {
                    header("Location: /?section=login");
                    exit;
                }
            } else {
                header("Location: /?section=login");
                exit;
            }
        }
    } else {
        header("Location: /?section=login");
        exit;
    }
?>