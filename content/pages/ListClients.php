<?php
    include_once './vendor/autoload.php';

    use OpenVpnPanel\Control\Commands;

    $clients = Commands::GetAllClients();
?>

<div class="container">
    <?php foreach ($clients as $client) { ?>
        <div class="card card-container">
            <div align='center'><h3><? echo $client; ?></h3></div>
            <button class="btn btn-lg btn-primary btn-block btn-signin">Manage Client</button>
        </div><!-- /card-container -->
    <?php } ?>
</div><!-- /container -->