<?php
    if (! isset($_GET['client'])) {
        header('Location: ?server_information');
        exit;
    }

    $webconfig = include_once './config/WebConfig.php';

    if (! file_exists($webconfig['client_storage'].'/'.$_GET['client'].'.ovpn')) {
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
            <a href='download_client.php?client=<?php echo $_GET['client']; ?>' style='text-decoration: none;'>
                <button class="btn btn-lg btn-primary btn-block btn-signin" style='margin-bottom: 5px;'>Download Client Configuration</button>
            </a>
            <a href='del_client.php?client=<?php echo $_GET['client']; ?>' style='text-decoration: none;'>
                <button class="btn btn-lg btn-primary btn-block btn-signin" style='margin-bottom: 5px;'>Delete Client</button>
            </a>
            <div class="well" align='center' style='color: orange;'>
                Deleting a client will force a restart of the OpenVPN process.
            </div>
        </div><!-- /card-container -->
</div><!-- /container -->