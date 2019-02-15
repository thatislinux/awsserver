import paho.mqtt.client as mqttClient
import time
gmessage="OFF" 
def on_connect(client, userdata, flags, rc):
 
    if rc == 0:
 
        print("Connected to broker")
 
        global Connected                #Use global variable
        Connected = True                #Signal connection 
 
    else:
 
        print("Connection failed")
 
Connected = False   #global variable for the state of the connection
 
broker_address= "localhost"
port = 1883
 
def on_message(client, userdata, msg):
    print(msg.topic+" "+str(msg.qos)+" "+str(msg.payload))
    gmessage = (msg.payload)
    print("GMESSAGE: " +str(msg.payload)+" " +str(gmessage))

client = mqttClient.Client("Python")               #create new instance
client.subscribe("#")
client.on_connect= on_connect                      #attach function to callback
client.connect(broker_address, port=port)          #connect to broker
client.on_message=on_message 

client.loop_start()        #start the loop
 
while Connected != True:    #Wait for connection
    time.sleep(0.1)
try:
    while True:
        value=str(gmessage) 
       
        client.publish("MOTORSWITCH",value)
 
except KeyboardInterrupt:
 
    client.disconnect()
    client.loop_stop()
