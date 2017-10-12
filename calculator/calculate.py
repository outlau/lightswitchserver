from sys import argv

import RPi.GPIO as GPIO

script, sumOne, sumTwo = argv

outputPinsOne = [21,20,16,12]
outputPinsTwo = [26,19,13,6]

sumOne = '{0:b}'.format(int(sumOne))
sumTwo = '{0:b}'.format(int(sumTwo))

GPIO.setmode(GPIO.BCM)

for i in range(0,len(outputPinsOne)):
	GPIO.setup(outputPinsOne[i],GPIO.OUT)
	if len(sumOne)-i - 1 >= 0 and int(sumOne[len(sumOne)-i - 1]) == 1:
		print "high"
		GPIO.output(outputPinsOne[i],GPIO.HIGH)
	else:
		print "low"
		GPIO.output(outputPinsOne[i],GPIO.LOW)

for i in range(0,len(outputPinsTwo)):
	GPIO.setup(outputPinsTwo[i],GPIO.OUT)
	if len(sumTwo)-i - 1 >= 0 and int(sumTwo[len(sumTwo)-i - 1]) == 1:
		print "high"
		GPIO.output(outputPinsTwo[i],GPIO.HIGH)
	else:
		print "low"
		GPIO.output(outputPinsTwo[i],GPIO.LOW)

