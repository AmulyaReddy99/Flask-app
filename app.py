from flask import Flask, render_template, request, flash, redirect, url_for, session, logging
# from flask_mysqldb import MySQL
from wtforms import Form, StringField, TextAreaField, PasswordField, validators
from wtforms.fields.html5 import EmailField
from passlib.hash import sha256_crypt
import database

app = Flask(__name__)

# cursor.execute("SELECT name FROM sqlite_master WHERE type='table';")
# print(cursor.fetchall())

# mag=''

class RegisterForm(Form):
	"""docstring for RegisterForm"""
	name = StringField('Name', [validators.Length(min=5, max=50),validators.DataRequired()])
	username = StringField('Username', [validators.Length(min=5, max=25),validators.DataRequired()])
	email = EmailField('Email', [validators.Email("Please enter your email address."),validators.DataRequired()])
	password = PasswordField('Password',[
		validators.DataRequired(),
		validators.EqualTo('confirm', message = 'Passwords do not match')
	])
	confirm = PasswordField('Confirm Password')


@app.route('/', methods = ['GET', 'POST'])
@app.route('/register', methods = ['GET', 'POST'])
def register():
	form = RegisterForm(request.form)
	if request.method == 'POST' and form.validate():
		name = form.name.data
		email = form.email.data
		username = form.username.data
		password = sha256_crypt.encrypt(str(form.password.data))

		database.database(name, email, username, password)

		session['logged_in'] = True
		session['username'] = username
		return render_template('layout.html')

		# return redirect(url_for('index'))
	return render_template('home.html', form=form)

@app.route('/logout')
def logout():
	session.clear()
	return redirect(url_for('register'))


if __name__=='__main__':
	app.secret_key = 'secret123'
	app.run(debug=True)


