import machine
import dht
import time
import urequests

def domeasure():
    #calibrando
    counterCalibration = 8
    print("Calibrando...")
    while counterCalibration >= 1:
        dht11Pin = dht.DHT11(machine.Pin(4))
        dht11Pin.measure()
        print("Aguarde {} segundos".format(counterCalibration))
        counterCalibration -= 1
        time.sleep(1)
    
    #medidas oficiais    
    print("Medindo temperatura e humidade...")
    time.sleep(2)
    dht11Pin = dht.DHT11(machine.Pin(4))
    dht11Pin.measure()
    
    localTemperature = dht11Pin.temperature()
    localHumidity = dht11Pin.humidity()
    
    print("\nA temperatura local é de {}°C".format(localTemperature))
    print("A humidade local é de {}%\n".format(localHumidity))
    
    #liga ou desliga o relé
    relePin = machine.Pin(2, machine.Pin.OUT)    
    if (localTemperature > 31) or (localHumidity > 70):
        relePin.value(1)
        print("Relé Ligado")
    else:            
        relePin.value(0)
        print("Relé Desligado")
    
    #envia os dados para ThingSpeak
    print("\nEnviando dados ao ThingSpeak...")
    urequests.get("https://api.thingspeak.com/update?api_key=9SKQGN7MTHVQWVKC&field1={}&field2={}".format(localTemperature,localHumidity))
    print("Dados enviados ao ThingSpeak...\n")
    time.sleep(1)

