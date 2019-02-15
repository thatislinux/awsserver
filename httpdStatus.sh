#!/bin/bash

# Os Specifc tweaks do not change anything below ;)
OS="$(uname)"
TRUE="1"
if [ "$OS" == "FreeBSD" ]; then
        TEMPFILE="$(mktemp /tmp/$(basename $0).tmp.XXX)"

elif [ "$OS" == "Linux" ]; then
        TEMPFILE="$(mktemp)"

fi

# admin user email ids
EMAIL="balajayaram22@gmail.com"

# Subject for email
SUBJECT=" Thatislinux - Alert HTTP:5XX Crossed Limit within 10 mins"

#Read the last 10Mins Log file
#awk -vDate=`date -d'now-10 min' +[%d/%b/%Y:%H:%M:%S` '$4 > Date {print $0}' /etc/httpd/logs/access_log >> /tmp/10minAccessLogs.log





#Get the Count of ALL HTTP Status
HTTP_STATUS=$(cat /tmp/10minAccessLogs.log | awk '{print $8 $9}'|sort -n |uniq -c |sort -n -r)

#GET HTTP_500 Status Count
HTTP_500_COUNT=$(cat /tmp/10minAccessLogs.log | awk '{print $8 $9}'|sort -n |uniq -c |sort -n -r |grep -i "\"500"|awk '{ sum+=$1} END {print sum}')

HTTP_503_COUNT=$(cat /tmp/10minAccessLogs.log | awk '{print $8 $9}'|sort -n |uniq -c |sort -n -r |grep -i "\"503"|awk '{ sum+=$1} END {print sum}')

HTTP_SUCCESS_COUNT=$(cat /tmp/10minAccessLogs.log | awk '{print $8 $9}'|sort -n |uniq -c |sort -n -r |grep -i "\"20"|awk '{ sum+=$1} END {print sum}')

HTTP_REDIRECTION_COUNT=$(cat /tmp/10minAccessLogs.log | awk '{print $8 $9}'|sort -n |uniq -c |sort -n -r |grep -i "\"30"|awk '{ sum+=$1} END {print sum}')

HTTP_CLIENT_ERROR_COUNT=$(cat /tmp/10minAccessLogs.log | awk '{print $8 $9}'|sort -n |uniq -c |sort -n -r |grep -i "\"40"|awk '{ sum+=$1} END {print sum}')

HTTP_SERVER_ERROR_COUNT=$(cat /tmp/10minAccessLogs.log | awk '{print $8 $9}'|sort -n |uniq -c |sort -n -r |grep -i "\"50"|awk '{ sum+=$1} END {print sum}')

#Print the Details in Log File
echo "~~~~~~~~~~~~~Start of HTTP STATUS MONITORING~~~~~~~~~" >> $TEMPFILE
echo "Current Time Stamp : $(date)" >> $TEMPFILE

# Notify Thresold for HTTP_SERVER_ERROR_COUNT
NOTIFY=1

# mail message
# keep it short coz we may send it to page or as an short message (SMS)
echo "~~~~~BE3:HTTP ERROR STATUS SCRIPT~~~~ " >> $TEMPFILE
echo "HTTP STATUS" >> $TEMPFILE
echo "$HTTP_STATUS" >> $TEMPFILE
echo "HTTP_500_COUNT : $HTTP_500_COUNT" >> $TEMPFILE
echo "NOTIFY_THRESOLD : $NOTIFY" >> $TEMPFILE

# Look if it crossed limit
# compare it with last 10 min Access Logs

# if so send an email
if [[ "$HTTP_SERVER_ERROR_COUNT" -gt "$NOTIFY" ]]; then
       mail -s "$SUBJECT" "$EMAIL" < $TEMPFILE
       echo "Email Send to Receipients" >> $TEMPFILE
fi

echo "Starting Log TimeStamp :$(cat /tmp/10minAccessLogs.log|head -1)" >> $TEMPFILE
echo "Ending Log TimeStamp   :$(cat /tmp/10minAccessLogs.log|tail -1)" >> $TEMPFILE
echo "Count of Total Lines   :$(cat /tmp/10minAccessLogs.log|wc -l)" >> $TEMPFILE
echo "~~~~~~~~~~~~~End of HTTP STATUS MONITORING~~~~~~~~~" >> $TEMPFILE
cat $TEMPFILE >> /root/monscripts/loghttpstatus.log
# remove file
rm -f $TEMPFILE

rm -f /tmp/10minAccessLogs.log
