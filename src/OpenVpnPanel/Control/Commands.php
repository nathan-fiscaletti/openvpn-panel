<?php

namespace OpenVpnPanel\Control;

class Commands
{
    public static function StartServer()
    {
        shell_exec('./bin/start');
    }

    public static function StopServer()
    {
        shell_exec('./bin/stop');
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
        $webconfig = include_once './config/WebConfig.php';
        return shell_exec('./bin/client count '.$webconfig['client_storage']);
    }

    public static function AddNewClient($client)
    {
        $webconfig = include_once './config/WebConfig.php';
        if (file_exists($webconfig['client_storage'].'/'.$client.'.ovpn')) {
            return 0;
        }

        shell_exec('./bin/addclient '.$client.' '.$webconfig['client_storage']);
        return 1;
    }

    public static function DeleteClient($client)
    {
        $webconfig = include_once './config/WebConfig.php';
        if (file_exists($webconfig['client_storage'].'/'.$client.'.ovpn')) {
            return 0;
        }

        shell_exec('./bin/dellclient '.$client.' '.$webconfig['client_storage']);
        return 1;
    }

    public static function GetAllClients()
    {
        $webconfig = include_once './config/WebConfig.php';
        $data = shell_exec('./bin/client list '.$webconfig['client_storage']);
        
        $data = str_replace('.ovpn', '', $data);

        if (strpos($data, ',') !== false) {
            return explode(',', $data);
        }

        return [$data];
    }

    public static function GetClientConfiguration($client)
    {
        $webconfig = include_once './config/WebConfig.php';
        return file_get_contents($webconfig['client_storage'].'/'.$client.'.ovpn');
    }
}