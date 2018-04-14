<div class="container">
    <div class="card card-container">
        <div align='center'><h3>Add Client</h3></div>
        <br />
        <?php 
        if (isset($_GET['status'])) {
            if ($_GET['status'] == '1') {
                ?>
                    <div class="well" align='center' style='color: green;'>
                        Client added successfully!
                    </div>
                <?php
            } else {
                ?>
                    <div class="well" align='center' style='color: red;'>
                        Failed to add client!
                    </div>
                <?php
            }
        }
        ?>
        <form class="form-signin" action="add_client.php" method='GET'>
            <span id="reauth-email" class="reauth-email"></span>
            <input type="text" id="inputUsername" class="form-control" name='client' placeholder="Name" required autofocus>
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Add</button>
        </form><!-- /form -->
    </div><!-- /card-container -->
</div><!-- /container -->