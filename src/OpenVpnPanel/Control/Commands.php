<?php

namespace OpenVpnPanel\Control;

class Commands
{
    public static function StartServer()
    {
        shell_exec('./bin/start');
    }

    public static function GetVersion()
    {
        return shell_exec('./bin/version');
    }

    public static function GetStatus()
    {
        return shell_exec('./bin/status');
    }

    public static function GetClientCount()
    {
        return shell_exec('./bin/client count /root');
    }

    public static function GetAllClients()
    {
        $data = shell_exect('./bin/client list /root');
        
        if (strpos($data, ',') !== false) {
            return explode(',', $data);
        }

        return [$data];
    }
}