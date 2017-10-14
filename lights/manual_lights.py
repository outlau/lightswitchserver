import RPi.GPIO as GPIO
import time
import MySQLdb




input_pin = 20
lights_pin = 21
outputs = [GPIO.LOW, GPIO.HIGH]

GPIO.setmode(GPIO.BCM)
GPIO.setup(input_pin, GPIO.IN)
prev_input = 0

while True:
	
	input = GPIO.input(input_pin)
	if True:#not prev_input and input:

		db = MySQLdb.connect(host="localhost", user="admin", passwd="tupac21", db="myDB")
		cursor = db.cursor()
		# execute SQL select statement
		cursor.execute("SELECT state FROM lights WHERE id = 'Lights'")
		
		# commit your changes
		db.commit()
		
		r = cursor.fetchone()[0]
		r = (int(r)+1)%2
		print r
		
		cursor.execute("UPDATE lights SET state = %s WHERE id = 'Lights'" % (r))
		db.commit()
		
		
		GPIO.setmode(GPIO.BCM)
		GPIO.setup(lights_pin,GPIO.OUT)
		GPIO.output(lights_pin,outputs[r])
	
		
		print "on" , time.time()
	prev_input = input
	time.sleep(5)
	
	
