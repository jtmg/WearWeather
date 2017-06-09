import os
import glob
import time
import  threading 
import time 
class sensorTemp (threading.Thread):
	os.system('modprobe w1-gpio')
	os.system('modprobe w1-therm')
 
	
	
	def __init__(self,threadID, name):
		self.base_dir = '/sys/bus/w1/devices/'
		self.device_folder = glob.glob(self.base_dir + '28*')[0]
		self.device_file = self.device_folder + '/w1_slave'
		self.write_path = "/var/www/html"
		threading.Thread.__init__(self)
		self.threadID = threadID
		self.name = name
	
	def run (self):
		print ("collecting temperatures")
		while True:
			print(self.read_temp())
			self.save(str(self.read_temp()))
			time.sleep(60)

		
	def read_temp_raw(self):
		f = open(self.device_file, 'r')
		lines = f.readlines()
		f.close()
		return lines
	def save(self, content):
		aux = self.write_path + "/temperatures.html"
		if not os.path.exists(aux):
			open(aux,"w").close()
		f = open(aux,"w")
		f.write(content)
		f.close()
 
	def read_temp(self):
		lines = self.read_temp_raw()
		while lines[0].strip()[-3:] != 'YES':
			time.sleep(0.2)
			lines = self.read_temp_raw()
		equals_pos = lines[1].find('t=')
		if equals_pos != -1:
			temp_string = lines[1][equals_pos+2:]
			temp_c = float(temp_string) / 1000.0
			return temp_c
