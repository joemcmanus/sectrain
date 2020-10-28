# sectrain
----

![alt_tag](https://github.com/joemcmanus/sectrain/blob/master/img/st-xss.png)

sectrain is a program to illustrate some basic security technigues such as XSS and buffer overflows along with how to stop them.  Currently this shows example in PHP and Python. 

Still to be done is include javascript, sqli and othe buffer overflows, should be done shortly. 

![alt_tag](https://github.com/joemcmanus/sectrain/blob/master/img/st-home.png)

# Installation
----
The simplest way to install sectrain is to use the snap 

    sudo snap install sectrain 

![alt_tag](https://github.com/joemcmanus/sectrain/blob/master/img/st-install.png)
# Web Starting 
----

    sectrain startweb 

# Web Stopping
----

    sectrain stopweb 

# Web Usage 
----

Open your browser to your host on port 1984, then browse choose the secure or insecure links. Try an exploit such as :

     
    "><script>alert('xss');</script>

You will see how sanitizing the input/output helps solve these issues. 

![alt_tag](https://github.com/joemcmanus/sectrain/blob/master/img/st-py.png)


# Python Buffer Overflows
----

There are two examples to look at, pybuffgood and pybuffbad, sending in too long of a string breaks it. Simple, but still a good way to illustrate the point. 

    sectrain pybuffbad  abcdefghijkl 
    sectrain pybuffgood abcdefghijkl

![alt_tag](https://github.com/joemcmanus/sectrain/blob/master/img/st-pybuff.png)

Clearly more can be done, but this is just to aid in getting people interested in fixing their code. 


