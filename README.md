# OpenVPN Panel Test
A web panel for controlling an OpenVPN server

## Setup

Add this direcory to your path variable either in `~/.bashrc` or using
```shell
export PATH=$PATH:/this/directory
```

## Installation
```shell
# Download OpenVPN Panel
git clone https://github.com/nathan-fiscaletti/openvpn-panel.git
cd openvpn-panel

# Modify Configuration
#    Set `host` and `port` values in config/server.ini
#    Set `client_storage` in config/server.ini
#        All client configurations will be stored here. This needs to be
#        the same location that is configured in WebConfig.php, and the
#        directory needs to be created before you start the OpenVPN Panel.
#    Set `client_storage` in config/WebConfig.php
#    Set `title` in config/WebConfig.php

# Install Dependencies
sudo apt-update
sudo apt install php composer -y
composer install

# Set up the OpenVPN Server
./bin/openvpn-install.sh

# Running the OpenVPN installation script will
# create a client configuration in the home directory.
# You should delete this and allow the panel to manage
# the certificates.
rm ~/client.ovpn

# Add the default user for the Panel
# (Use a secure password)
sudo openvpnpanel --adduser admin 'password'

# Start the Panel
sudo ./openvpnpanel --start
```

## Commands

### Start the panel
```shell
openvpnpanel --start
```

### Stop the panel
```shell
openvpnpanel --stop
```

### Get the status of the Panel
```shell
openvpnpanel --status
```

### Add Panel User
```shell
openvpnpanel --adduser [name] [password]
```

### Remove Panel User
```shell
openvpnpanel --deleteuser [name]
```

