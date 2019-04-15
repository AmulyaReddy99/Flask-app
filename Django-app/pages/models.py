from django.db import models

# Create your models here.
class LoginDB(object):
	name = models.CharField(max_length=200)
	email = models.TextField(max_length=200)	
	password = models.TextField(max_length=200)
