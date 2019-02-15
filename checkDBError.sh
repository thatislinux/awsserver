#!/bin/bash
cd /root/monscripts
#sudo -i
# Os Specifc tweaks do not change anything below ;)
mysql_service_check=`service mysqld status`
echo "Starting Script_________+++++++++++++++" >> /root/monscripts/checkDBlog.log
echo `date` >> /root/monscripts/checkDBlog.log
str1="mysqld dead";
echo $mysql_service_check >> /root/monscripts/checkDBlog.log
if [[ "$mysql_service_check" == *"$str1"* ]]; then
service mysqld restart
mail -s "Restarting MysqlD and HTTPD in Thatislinux.com" balajayaram22@gmail.com <<< "Mysql Server Restarted And HTTPD restarted at $date"
service httpd restart
echo "Services REstarted" >> /root/monscripts/checkDBlog.log
else
echo `date` >> /root/monscripts/checkDBlog.log
echo "website is running fine" >> /root/monscripts/checkDBlog.log
fi

echo "End of Script___________++++++++++++++++++________" >> /root/monscripts/checkDBlog.log
