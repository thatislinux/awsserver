#!/bin/bash
echo "Started for PUB" >> log.log
value=`cat /root/mqtt/test/sam.txt`
mosquitto_pub -t "MOTORSWITCH" -h localhost -m $value 
echo "Finishedi FOR PUB" >> log.log
