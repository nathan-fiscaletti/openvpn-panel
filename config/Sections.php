<?php

return [
    // Main Pages

    'login' => [
        'content' => './content/pages/Login.php',
        'nav'     => './content/navigation/LoggedOut.php'
    ],

    'server_info' => [
        'content' => './content/pages/ServerInformation.php',
        'nav'     => './content/navigation/LoggedIn.php'
    ],

    // Client Management

    'add_client' => [
        'content' => './content/pages/AddClient.php',
        'nav'     => './content/navigation/LoggedIn.php'
    ],

    'list_clients' => [
        'content' => './content/pages/ListClients.php',
        'nav'     => './content/navigation/LoggedIn.php'
    ],

    'manage_client' => [
        'content' => './content/pages/ManageClient.php',
        'nav'     => './content/navigation/LoggedIn.php'  
    ],
];