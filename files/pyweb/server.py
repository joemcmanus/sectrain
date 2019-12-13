from flask import Flask, Markup, request, make_response, escape

app = Flask(__name__)

@app.route('/')
def index():
	bodyText=Markup('''
	<a href=secure> Secure </a><br>
	<a href=insecure> Insecure </a><br>
	''')
	return bodyText

@app.route('/secure', methods=['GET', 'POST'])
def secure():
	if request.form:
		userInput=request.form['userInput']
		bodyText=escape(userInput)
	else: 
		bodyText=Markup('''
		<form method=POST action=/secure>
        	Input Text:: <input type=text name=userInput value=\"\"></input><br>
	        <input type=submit name=submit value=\"submit\">
	        </form>
	        ''')

	return bodyText

@app.route('/insecure', methods=['GET', 'POST'])
def insecure():
	if request.form:
		userInput=request.form['userInput']
		bodyText=userInput
	else: 
		bodyText=Markup('''
		<form method=POST action=/insecure>
        	Input Text:: <input type=text name=userInput value=\"\"></input><br>
	        <input type=submit name=submit value=\"submit\">
	        </form>
	        ''')

	return bodyText

if __name__ == '__main__':
        app.debug = True
        app.run(host='0.0.0.0', port=1985)
