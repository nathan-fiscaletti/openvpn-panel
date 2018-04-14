<div class="container">
        <h2>Server Log</h2>
        <div class="well" align='center'>
            <pre align='left' style='max-height: 600px;'><?php echo file_get_contents('/etc/openvpn/server.log'); ?></pre>
        </div>
</div><!-- /container -->