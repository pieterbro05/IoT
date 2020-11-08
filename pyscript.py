import serial
import time
import requests

ser= serial.Serial('/dev/cu.usbmodem14101',9600);
time.sleep(2)


  
while(1):


	b=ser.readline()
	string_n = b.decode()  
	string = string_n.rstrip()
	Lees=string
	print(Lees)
	userdata = {"Lees": Lees}
	resp = requests.post('https://11903162.pxl-ea-ict.be/Data.php', params=userdata)

	


ser.close()