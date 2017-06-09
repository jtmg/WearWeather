from Data import Data
from display import LCD
import time
import os
from temp import sensorTemp
from disp import disp
import  threading 

write_path = "/var/www/html"
def start():
	a = Data()
	print (a.temp)
	b = LCD()
	temp = sensorTemp(1,"sensor")
	temp.start()
	adv = { "cold": "Wrap your self.", "hot": "Drink Water.", "rain": "Bring umbrella.","mild":"fresh clothes"}
	if (a.temp > 19):
		advice = adv["hot"]
	elif (a.temp < 13):
		advice = adv["cold"]
	elif (a.temp >= 13  and a.temp <= 19 ):
		advice = adv["mild"]
	
	while True:
		
		display = "Temperature: " + str(a.temp) + "ºC" + "<br>" +  "Humidity: " + str(a.humidity) + "%" + "<br>" + "Precipitation: "+ str(a.precip_mm) + "mm"  + "<br>" + "Advice: " + advice
		b.lcd_string("Temperature", b.LCD_LINE_1)
		b.lcd_string(str(a.temp) + u'\u00b0' +"C",b.LCD_LINE_2)
		time.sleep(3)
		b.lcd_string("Humidity", b.LCD_LINE_1)
		b.lcd_string(str(a.humidity) + "%",b.LCD_LINE_2)
		time.sleep(3)
		b.lcd_string("Precipitation", b.LCD_LINE_1)
		b.lcd_string(str(a.precip_mm) + "mm",b.LCD_LINE_2)
		time.sleep(3)
		b.lcd_string( advice,b.LCD_LINE_1)
		b.lcd_string("",b.LCD_LINE_2)
		time.sleep(3)
		save(display)
	temp.exit()
def save( content):
		aux = write_path + "/disp.html"
		if not os.path.exists(aux):
			open(aux,"w").close()
		f = open(aux,"w")
		f.write(content)
		f.close()
try:		
	if __name__ == "__main__":
		start()
finally:
	print ("exit")
	os.system("rm *json")
