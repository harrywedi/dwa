from django.contrib.auth.models import AbstractUser, UserManager
from django.db import models

# Create your models here.
class User(AbstractUser):
  objects =  UserManager()
  user_status = (
   (1, 'Approved'),
   (2, 'Pending'),
   (3, 'Disapproved')
   )
  objects= UserManager();
  is_client = models.BooleanField(default=False)
  is_agent = models.BooleanField(default=False)
  phone= models.CharField(max_length=30,blank=True)
  status=models.PositiveSmallIntegerField(choices=user_status, default=2)
