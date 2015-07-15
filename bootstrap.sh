#!/usr/bin/env bash

    apt-get install -y mysql-server
    apt-get install -y mysql-client
    apt-get install -y php5-mysqlnd
    apt-get update

    echo "DROP USER 'mysqluser'@'localhost'" | mysql -uroot
    echo "CREATE USER 'mysqluser'@'localhost' IDENTIFIED BY '123123'" | mysql -uroot
    echo "DROP DATABASE IF EXISTS db_test" | mysql -uroot
    echo "CREATE DATABASE db_test" | mysql -uroot
    echo "GRANT ALL ON db_test.* TO 'mysqluser'@'localhost'" | mysql -uroot
    echo "flush privileges" | mysql -uroot
    mysql -uroot db_test < /vagrant/database.sql

    if ! [ -L /var/www ]; then
        rm -rf /var/www
        ln -fs /vagrant /var/www
    fi
    # copy project's apache conf to the default conf
    cp /vagrant/apache.conf /etc/apache2/sites-available/000-default.conf
    # start rewrite mode
    a2enmod rewrite
    #restart apache
    service apache2 restart