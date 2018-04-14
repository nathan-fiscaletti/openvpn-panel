<?php
    chdir('../');

    session_start();

    $sections = include_once './config/Sections.php';

    // Default section is login
    $section  = 'login';

    function authenticate_token($username, $token)
    {
        return $token == md5(date('Y.M.d').$username);
    }

    if (! empty($_SESSION['user']) && ! empty($_SESSION['token']))
    {
        if (! authenticate_token($_SESSION['user'], $_SESSION['token']))
        {
            echo "invalid token";
            unset($_SESSION['user']);
            unset($_SESSION['token']);
            $section = 'login';
        } else {
            if (! isset($_GET['section']))
            {
                $section = 'server_info';   
            } else {
                $section = (array_key_exists($_GET['section'], $sections))
                    ? $_GET['section']
                    : 'server_info';
            }
        }
    } else {
        $section = 'login';
    }

    $navigation = $sections[$section]['nav'];
    $content = $sections[$section]['content'];

    //$navigation = './content/navigation/LoggedIn.php';
    //$content    = './content/pages/AddClient.php';
?>

<title>Damage Inc. Sql VPN Control Panel</title>
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="./css/navigation.css" rel="stylesheet" id="sidebare-css">
<link href="./css/signin.css" rel="stylesheet" id="signing-css">
<script type='text/javascript' src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="./js/sidebar.js"></script>

<!------ Include the above in your HEAD tag ---------->

<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://cijulenlinea.ucr.ac.cr/dev-users/">
                <img src="https://dmg-inc.com/uploads/2018/01/DIBanner-LightTransBG-100.png" alt="LOGO" style='width:200px;height:50px;'>
                <!--<h2>DamageInc SQL VPN Control Panel</h2>-->
            </a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">      
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Version 1.1</b></a>
            </li>
        </ul>

        <!-- Begin Navigation -->
        <?php include_once $navigation; ?>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main" >
                <!-- Begin Page Content -->
                <?php include_once $content; ?>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->