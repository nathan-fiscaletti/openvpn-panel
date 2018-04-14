<?php
    include_once './vendor/autoload.php';

    use OpenVpnPanel\Control\Commands;

    $clients = Commands::GetAllClients();
?>

<div class="container">
        <div class="card card-container">
            <div align='center'><h3>Clients</h3><br /></div>
            <?php foreach ($clients as $client) { ?>
                <a href='?manage_client&client=<?php echo $client; ?>'><button class="btn btn-lg btn-primary btn-block btn-signin"><?php echo $client; ?></button></a>
            <?php } ?>
        </div><!-- /card-container -->
</div><!-- /container -->