# ~/.config/autostart/runswitchserver.desktop

import MySQLdb
import time
from Tkinter import *
import RPi.GPIO as GPIO

pin = {"Lights":21,"TV":20}
button_pin = 16

outputs = [GPIO.LOW,GPIO.HIGH]

db = MySQLdb.connect(host="localhost", user="root", passwd="tupac21", db="myDB")
cursor = db.cursor()
# execute SQL select statement
cursor.execute("UPDATE lights SET state = 0")

db.commit()

for v in pin.values():
	GPIO.setmode(GPIO.BCM)
	GPIO.setup(v,GPIO.OUT)
	GPIO.output(v,outputs[0])

GPIO.setmode(GPIO.BCM)
GPIO.setup(button_pin, GPIO.IN)
prev_input = 0


last_tick_time = 0

i = 0
while True:
	
	input = GPIO.input(button_pin)
	if time.time() > last_tick_time + 1: 
		db = MySQLdb.connect(host="localhost", user="root", passwd="tupac21",
		db="myDB")
		cursor = db.cursor()
		# execute SQL select statement
		cursor.execute("SELECT * FROM lights")
		
		# commit your changes
		db.commit()
		
		# get the number of rows in the resultset
		numrows = int(cursor.rowcount)
		
		# get and display one row at a time.
		for x in range(0,numrows):
			row = cursor.fetchone()
			print row
			
			print time.time()
			try:
				if row[2] < time.time() and row[2] > 0:
					print "activate"
					
					GPIO.setmode(GPIO.BCM)
					GPIO.setup(pin[row[0]],GPIO.OUT)
					GPIO.output(pin[row[0]],outputs[row[3]])
	
					cursor.execute("""
						UPDATE lights 
						SET time = %s, state = %s 
						WHERE id = %s
					""", (int(i),row[3],row[0]))
					
					db.commit()
			except TypeError:
				print "error"
			
			last_tick_time = time.time()
			
	if not prev_input and input:

		db = MySQLdb.connect(host="localhost", user="root", passwd="tupac21", db="myDB")
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
		GPIO.setup(pin["Lights"],GPIO.OUT)
		GPIO.output(pin["Lights"],outputs[r])
	
		
		print "on" , time.time()
	prev_input = input
	time.sleep(0.05)

		
		
 	
	    	
	    
	    
	
	
	