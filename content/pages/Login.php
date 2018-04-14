<div class="container">
    <div class="card card-container">
        <div align='center'><h3>Sign In</h3></div>
        <form class="form-signin" action="auth.php" method="POST">
            <span id="reauth-email" class="reauth-email"></span>
            <div class="well" align='center'>
                <?php if(isset($_GET['badlogin'])) { ?>
                    <span style='color:red;'>Invalid credentials.</span><br /><br />
                <?php } ?>
                If you do not have an account, contact the System Administrator.
            </div>
            
            <input type="text" id="inputUsername" class="form-control" name='username' placeholder="Username" required autofocus>
            <input type="password" id="inputPassword" class="form-control" name='password' placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
        </form><!-- /form -->
    </div><!-- /card-container -->
</div><!-- /container -->