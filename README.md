# sectrain
----

sectrain is a program to illustrate some technigues used in XSS and how to stop them.  Currently this shows example in PHP and Python. 

Still to be done is include javascript and buffer overflows, should be done shortly. 


#Installation
----
The simplest way to install sectrain is to use the snap 

    sudo snap install teamtime 

#Starting 
----

    sectrain startweb 

#Stopping
----

    sectrain stopweb 

#Usage 
----

Open your browser to your host on port 1984, then browse choose the secure or insecure links. Try an exploit such as :

     
    "><script>alert('xss');</script>

You will see how sanitizing the input/output helps solve these issues. 

Clearly more can be done, but this is just to aid in getting people interested in fixing their code. 


