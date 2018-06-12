<?php
    include_once './vendor/autoload.php';

    use OpenVpnPanel\Control\Commands;

    $clients = Commands::GetAllClients();
?>

<div class="container">
        <div class="card card-container">
            <div align='center'><h3>Clients</h3><br /></div>
            <?php 
            if (isset($_GET['deleted'])) {
                if ($_GET['deleted'] == '1') {
                    ?>
                        <div class="well" align='center' style='color: green;'>
                            Successfully deleted client!
                        </div>
                    <?php
                }
            }
            ?>
            <?php if (count($clients) < 1) { ?>
                <div class="well" align='center' style='color: orange;'>
                    No clients available.
                </div>
            <?php } else { ?>
                <div class="well" align='center'>
                    Click on a client to open it's management panel.
                </div>
            <?php } ?> 
            <?php foreach ($clients as $client) { ?>
                <a href='?section=manage_client&client=<?php echo $client; ?>' style='text-decoration: none;'>
                    <button class="btn btn-lg btn-primary btn-block btn-signin" style='margin-bottom: 5px;'>
                        <?php echo $client; ?>
                    </button>
                </a>
            <?php } ?>
        </div><!-- /card-container -->
</div><!-- /container -->