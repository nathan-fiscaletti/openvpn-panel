<?php

if (sizeof($argv) < 2) {
    exit(3);
}

if (! ($argv[1] == '-add' || $argv[1] == '-delete'))
{
    exit(2);
}

if ($argv[1] == '-add') {
    if (sizeof($argv) < 4) {
        echo "Usage: openvpnpanel --adduser [username] [password]".PHP_EOL;
        exit(1);
    }

    addUser($argv[2], $argv[3]);
} else if ($argv[1] == '-delete') {
    if (sizeof($argv) < 3) {
        echo "Usage: openvpnpanel --deleteuser [username]".PHP_EOL;
        exit(1);
    }
    deleteUser($argv[2]);
}

function addUser($user, $pass)
{
    $users = [];
    if (file_exists('./users.json')) {
        $users = json_decode(file_get_contents('./users.json'), true);
    }

    $users[$user] = [
        'password' => md5($pass)
    ];

    file_put_contents('./users.json', json_encode($users, JSON_PRETTY_PRINT));

    echo "OpenVPNPanel: Added user '$user'.".PHP_EOL;
}

function deleteUser($user)
{
    $users = [];
    if (file_exists('./users.json')) {
        $users = json_decode(file_get_contents('./users.json'), true);
    }

    unset($users[$user]);

    file_put_contents('./users.json', json_encode($users, JSON_PRETTY_PRINT));

    echo "OpenVPNPanel: Deleted user '$user'.".PHP_EOL;
}