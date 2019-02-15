#!/bin/bash
echo "Started" >> log.log
rm -f /root/mqtt/test/sam.txt
mosquitto_sub -t "#" -h localhost > /root/mqtt/test/sam.txt

echo "Finished" >> log.log
