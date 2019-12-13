#!/bin/bash

php7.2 -S 0.0.0.0:1984 -t $SNAP/phpweb  & 
python3 $SNAP/pyweb/server.py & 
