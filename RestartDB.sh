#!/bin/bash
service mysqld restart
service httpd restart
/etc/init.d/mysqld restart
/etc/init.d/httpd restart
