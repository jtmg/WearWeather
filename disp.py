import  threading 
from display import LCD
import time

class disp (threading.Thread):
	def __init__(self,temp,humi,precip, advice):
		#super(disp,self).__init__()
		self.temp = temp
		self.humi = humi
		self.precip = precip
		self.advice = advice
		self.lcd = LCD()
	
	def run (self):
		print ("run")
		while True:
			self.lcd.lcd_string("Temperature", self.lcd.LCD_LINE_1)
			self.lcd.lcd_string(str(self.temp) + u'\u00b0' +"C",self.lcd.LCD_LINE_2)
			time.sleep(3)
			self.lcd.lcd_string("Humidity", self.lcd.LCD_LINE_1)
			self.lcd.lcd_string(str(self.humi) + "%",self.lcd.LCD_LINE_2)
			time.sleep(3)
			self.lcd.lcd_string("Precipitation", self.lcd.LCD_LINE_1)
			self.lcd.lcd_string(str(self.precip) + "mm",self.lcd.LCD_LINE_2)
			time.sleep(3)
			self.lcd.lcd_string(self.advice,self.lcd.LCD_LINE_1)
			self.lcd.lcd_string("",self.lcd.LCD_LINE_2)
			time.sleep(3)
			