echo "==================Script Starts========"

echo " WP-CONTENT BACKUP STARTS"
#src_path="/home/ec2-user/backup/wp-content"
src_path="/var/www/www.thatislinux.com"
echo "Source Path: $src_path"

dstn_path="/home/ec2-user/Backup/"
echo "Destination Path: $dstn_path"


date_1=$(date +"%d-%b-%Y-%H%M%S")
echo $date_1

file_name="www.thatislinux.com_$date_1"
file_name_tar="$file_name.tar.gz"
echo "File Name:" $file_name
echo "File Name Tar:"$file_name_tar

rm -fR www.thatislinux.com

echo "Copy starts......"
cp -Rp $src_path $dstn_path
echo "Copy Finishes"

cd $dstn_path
echo "Start Zipping the file"
tar -cvzf $file_name_tar www.thatislinux.com

echo "Completed the tar file"
rm -Rf www.thatislinux.com
echo "WP-CONTENT BACKUP COMPLETED"

echo "DB-MYSQL Backup Start"
#database credentials
user="that_is_linux"
password="San123tv#"
host="localhost"
db_name="thatislinuxdotcom"

backup_path="/home/ec2-user/Backup"
date1=$(date +"%d-%b-%Y-%H%M%S")
dbfile_name="$db_name.sql"
echo $dbfile_name
dbfile_name_tar="$dbfile_name.tar.gz"
echo $dbfile_name_tar
umask 177

mysqldump --user=$user --password=$password --host=$host $db_name > $backup_path/$dbfile_name
tar -cvzf  thatislinuxdotcom.sql.tar.gz $dbfile_name
rm -fR $dbfile_name
db_tar="$dbfile_name_tar"
echo $db_tar
mv thatislinuxdotcom.sql.tar.gz  thatislinuxdotcom.$date1.sql.tar.gz
echo "MYSQL BACKUP COMPLETED"

exit


