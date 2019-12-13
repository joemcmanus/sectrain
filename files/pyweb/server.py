#!/usr/bin/env python3
# File    : server.py  - a web interface to display coding vulnerabilities
# Author  : Joe McManus josephmc@alumni.cmu.edu
# Version : 0.1  12/12/2019 Joe McManus
# Copyright (C) 2019 Joe McManus
#
# This program is free software: you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 3 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program.  If not, see <http://www.gnu.org/licenses/>.

from flask import Flask, Markup, request, make_response, escape, render_template

app = Flask(__name__)

@app.route('/')
def index():
	titleText="Python Secure Training Examples"
	bodyText=Markup('''
	<a href=secure> Secure </a><br>
	<a href=insecure> Insecure </a><br>
	''')
	return render_template('templatecss.html', bodyText=bodyText, titleText=titleText)

@app.route('/secure', methods=['GET', 'POST'])
def secure():
	titleText="Secure Form"
	if request.form:
		userInput=request.form['userInput']
		bodyText=escape(userInput)
		bodyText=bodyText + Markup('''
		<br>View the files on <a href=https://github.com/joemcmanus/sectrain/blob/master/files/pyweb/>github</a> 
		to determine what stopped the XSS
		''')
	else: 
		bodyText=Markup('''
		<form method=POST action=/secure>
        	Input Text: <input type=text name=userInput value=\"\"></input><br>
	        <input type=submit name=submit value=\"submit\">
	        </form>
	        ''')

	return render_template('templatecss.html', bodyText=bodyText, titleText=titleText)

@app.route('/insecure', methods=['GET', 'POST'])
def insecure():
	titleText="Insecure Form"
	if request.form:
		userInput=request.form['userInput']
		bodyText=Markup(userInput)
	else: 
		bodyText=Markup('''
		<form method=POST action=/insecure>
        	Input Text: <input type=text name=userInput value=\"\"></input><br>
	        <input type=submit name=submit value=\"submit\">
	        </form>
	        ''')
	return render_template('templatecss.html', bodyText=bodyText, titleText=titleText)

@app.route('/about')
def about():
	titleText="About"
	bodyText=Markup('''This was written as a way to show both secure and insecure web applications to engineers. <br> 
	It will add new functionality as time allows. 
	<br> Source code can be found at : <a href=https://github.com/joemcmanus/sectrain> github </a> <br>
	<br><br>
	Thanks - Joe 
	''')
	return render_template('templatecss.html', bodyText=bodyText, titleText=titleText)
	

if __name__ == '__main__':
        app.debug = True
        app.run(host='0.0.0.0', port=1985)
