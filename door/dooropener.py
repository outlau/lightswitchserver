
import time
import RPi.GPIO as GPIO
from Tkinter import *
from sys import argv

script, val = argv


#Servo
GPIO.setmode(GPIO.BCM)
GPIO.setup(14, GPIO.OUT)
pwm = GPIO.PWM(14, 100) #Servo output
pwm.start(5)

time0 = time.time()
rotation = 0
if int(val) == 1:
	#LOCK
	rotation = 4.3
elif int(val) == 0:
	#UNLOCK
	rotation = 20
	

print time0

while time.time() < time0 + 1:
	pwm.ChangeDutyCycle(float(rotation))

print time.time()