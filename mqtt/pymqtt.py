import paho.mqtt.client as paho
gmessage="OFF"

def on_subscribe(client, userdata, mid, granted_qos):
    print("Subscribed: "+str(mid)+" "+str(granted_qos))

def on_message(client, userdata, msg):
    print(msg.topic+" "+str(msg.qos)+" "+str(msg.payload))    
    global gmessage
    gmessage = (msg.payload)
    print("GMESSAGE: " +str(msg.payload)+" " +str(gmessage))
 
def on_publish(client, userdata, mid):
    print("MOTORSWITCH : "+str(mid))


client = paho.Client()
client.on_subscribe = on_subscribe
client.on_message = on_message
client.connect("localhost", 1883)
client.subscribe("#", qos=1)
client.on_publish = on_publish
client.publish("MOTORSWITCH",str(gmessage))
client.loop_forever()
