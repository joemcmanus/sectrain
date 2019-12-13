#!/bin/bash


case $1 in 

startweb)
	php7.2 -S 0.0.0.0:1984 -t $SNAP/phpweb  >/dev/null 2>&1 & 
	python3 $SNAP/pyweb/server.py >/dev/null 2>&1 & 
	echo "Open your browser to this host on port 1984. eg: http://thisHostIP:1984" 

;;

stopweb) 
	kill `ps -ef | grep php7.2 | grep -v grep | awk ' { print $2 } ' `
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
