<?php
    include_once './vendor/autoload.php';

    use OpenVpnPanel\Control\Commands;

    $clients = Commands::GetAllClients();
?>

<div class="container">
        <div class="card card-container">
            <div align='center'><h3>Clients</h3></div>
            <?php foreach ($clients as $client) { ?>
                <button class="btn btn-lg btn-primary btn-block btn-signin"><?php echo $client; ?></button>
            <?php } ?>
        </div><!-- /card-container -->
</div><!-- /container -->