#!/bin/bash
#bash script to launch the php server. 

case $1 in 

startweb)
	php8.1 -S 0.0.0.0:1984 -t $SNAP/phpweb  >/dev/null 2>&1 & 
	python3 $SNAP/pyweb/server.py >/dev/null 2>&1 & 
	echo "Open your browser to this host on port 1984. eg: http://127.0.0.1:1984" 

;;

stopweb) 
	kill `ps -ef | grep php | grep -v grep | awk ' { print $2 } ' `
	kill `ps -ef | grep server.py | grep -v grep | awk ' { print $2 } ' `
;;
pybuffbad) 
	$SNAP/bin/pyBuffBad.py $2 
;;
pybuffgood) 
	$SNAP/bin/pyBuffGood.py $2 
;;

*)
	echo " Usage sectrain startweb|stopweb|pybuffbad|pybuffgood"
;;

esac	
