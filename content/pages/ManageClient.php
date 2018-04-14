<?php
    if (! isset($_GET['client'])) {
        header('Location: ?server_information');
        exit;
    }

    if (! file_exists('\/root/'.$_GET['client'].'.ovpn')) {
        header('Location: ?server_information');
        exit;
    }

    include_once './vendor/autoload.php';

    use OpenVpnPanel\Control\Commands;

    $client_body = Commands::GetClientConfiguration($_GET['client']);

?>

<div class="container">
        <div class="card card-container">
            <div align='center'><h3><?php echo $_GET['client']; ?></h3><br /></div>
            <button class="btn btn-lg btn-primary btn-block btn-signin">Download Client Configuration</button>
            <button class="btn btn-lg btn-primary btn-block btn-signin">Manage Routes For Client</button>
            <button class="btn btn-lg btn-primary btn-block btn-signin">Delete Client</button>
        </div><!-- /card-container -->
</div><!-- /container -->