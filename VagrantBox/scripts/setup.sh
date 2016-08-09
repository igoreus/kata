#!/usr/bin/env bash

export DEBIAN_FRONTEND=noninteractive
export KATA_ROOT=${KATA_ROOT:-/kata}

echo 'LC_ALL="en_US.UTF-8"' > /etc/environment
update-locale
sudo apt-get update
apt-get install -y php5 php5-dev php5-xdebug php5-intl php5-cli php5-mcrypt mc > /dev/null

curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer
chmod +x /usr/local/bin/composer

cd ${KATA_ROOT} && sudo -u vagrant composer install