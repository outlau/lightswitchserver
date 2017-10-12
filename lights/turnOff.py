from sys import argv

pin = {"Lights":21,"TV":20}

script, outputPin = argv

from Tkinter import *
import RPi.GPIO as GPIO
import atexit


GPIO.setmode(GPIO.BCM)
GPIO.setup(pin[outputPin],GPIO.OUT)

GPIO.output(pin[outputPin],GPIO.LOW)
