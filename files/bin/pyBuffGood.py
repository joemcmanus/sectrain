#!/usr/bin/env python3

import sys
if len(sys.argv) != 2:
	print("ERROR: Must supply 1 argument.") 
	quit()
else:
	userInput=sys.argv[1]

fixedBuff=[None]*10
if len(userInput) > 10:
	userInput=userInput[:10]
	print("Input too long, truncated at 10 characters")
j=0
for i in userInput:
	print("Appending: " + str(i))
	fixedBuff[j]=i
	j=j+1	

