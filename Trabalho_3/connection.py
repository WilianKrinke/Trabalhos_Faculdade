import network
import time

def handleconnect(ssid, passWord):
    station = network.WLAN(network.STA_IF)
    station.active(True)
    station.connect(ssid,passWord)
    
    #verificação de rede
    for t in range(50):
        if station.isconnected():
            break
        time.sleep(0.1)
    
    return station
