#!/usr/bin/env python3

import sys
if len(sys.argv) != 2:
	print("ERROR: Must supply 1 argument.") 
	quit()
else:
	userInput=sys.argv[1]

fixedBuff=[None]*10
j=0
for i in userInput:
	print("Appending: " + str(i))
	fixedBuff[j]=i
	j=j+1	

