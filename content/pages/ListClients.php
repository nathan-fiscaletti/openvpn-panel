<?php
    include_once './vendor/autoload.php';

    use OpenVpnPanel\Control\Commands;

    $clients = Commands::GetAllClients();
?>

<div class="container">
        <div class="card card-container">
            <div align='center'><h3>Clients</h3><br /></div>
            <div class="well" align='center'>
                Click on a client to open it' management panel.
            </div>
            <?php foreach ($clients as $client) { ?>
                <a href='?section=manage_client&client=<?php echo $client; ?>' style='text-decoration: none;'>
                    <button class="btn btn-lg btn-primary btn-block btn-signin">
                        <?php echo $client; ?>
                    </button><br />
                </a>
            <?php } ?>
        </div><!-- /card-container -->
</div><!-- /container -->