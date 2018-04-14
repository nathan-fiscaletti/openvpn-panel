<?php

if (sizeof($argv) < 3) 
{
    echo "Usage: ./control [-adduser|-deleteuser] User [password]".PHP_EOL;
    exit(1);
}

if (! ($argv[1] == '-add' || $argv[1] == '-delete'))
{
    echo "Usage: ./control [-adduser|-deleteuser] User [password]".PHP_EOL;
    exit(1);   
}

if ($argv[1] == '-add') {
    if (sizeof($argv) < 4) {
        echo "Usage: ./control [-adduser|-deleteuser] User [password]".PHP_EOL;
        exit(1);          
    }

    addUser($argv[2], $argv[3]);
} else if ($argv[1] == '-delete') {
    deleteUser($argv[2]);
} else {
    echo "Usage: ./control [-adduser|-deleteuser] User [password]".PHP_EOL;
    exit(1); 
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
}

function deleteUser($user)
{
    $users = [];
    if (file_exists('./users.json')) {
        $users = json_decode(file_get_contents('./users.json'), true);
    }

    unset($users[$user]);

    file_put_contents('./users.json', json_encode($users, JSON_PRETTY_PRINT));
}