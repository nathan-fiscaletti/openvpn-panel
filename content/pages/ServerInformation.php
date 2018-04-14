<?php
    include_once './vendor/autoload.php';

    use OpenVpnPanel\Control\Commands;

    $status       = Commands::GetStatus();
    $version      = Commands::GetVersion();
    $client_count = Commands::GetClientCount();
?>

<div class="container">
    <div class="card card-container">
        <div align='center'>
            <h3 style='padding-bottom: 10px;'>
                Server Information
            </h3>
            <b>
                Server Status<br />
                <?php
                    if ($status == "1") {
                        ?>
                            <span style='color: green;' class='fa fa-check-square'> Running</span>
                        <?php
                    } else {
                        ?>
                            <span style='color: red;' class='fa fa-minus-square'> Not Running</span>
                        <?php
                    }
                ?>
            </b>
            <br /><br />
            <b>
                OpenVPN Version<br />
                <span style='color: #428bca;'><?php echo $version; ?></span>
            </b>
            <br /><br />
            <b>
                Client Count<br />
                <a href='?section=list_clients'><?php echo $client_count; ?></a>
            </b>
            <br /></br />
            <?php
                if ($status == "1") {
                    ?>
                        <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">
                            Stop Server
                        </button>
                    <?php
                } else {
                    ?>
                        <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">
                            Start Server
                        </button>
                    <?php
                }
            ?>
        </div>
    </div><!-- /card-container -->
</div><!-- /container -->