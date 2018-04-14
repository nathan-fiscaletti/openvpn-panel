<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li>
            <a href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-fw fa-server"></i> Server<i class="fa fa-fw fa-angle-down pull-right"></i></a>
            <ul id="submenu-1" class="collapse">
                <li>
                    <a href="?section=server_information"><i class="fa fa-fw fa-info"></i> Server Information</a>
                </li>
                <li>
                    <a href="?section=server_log"><i class="fa fa-fw fa-history"></i> Server Log</a>
                </li>
            </ul>
        </li>
        
        <li>
            <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-user"></i> Manager Clients<i class="fa fa-fw fa-angle-down pull-right"></i></a>
            <ul id="submenu-2" class="collapse">
                <li><a href="?section=add_client"><i class="fa fa-user-plus"></i> Add Client</a></li>
                <li><a href="?section=list_clients"><i class="fa fa-users"></i> List Clients</a></li>
            </ul>
        </li>
        <li>
            <a href="auth.php?logout"><i class="fa fa-fw fa-sign-out"></i> Sign Out</a>
        </li>
    </ul>
</div>