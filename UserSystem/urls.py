from django.urls import path
from . import views

urlpatterns = [
    path('', views.login, name="login"),
    path('signup/', views.signup, name="signup"),
    path('login/', views.login, name="login"),
    path('dashboard/', views.dashboard, name="dashboard"),
    ###Registered Investers
    path('registered-investors/', views.regdInvestors, name="regdInvestors"),

    path('register-investors/', views.regInvestors, name="regInvestors"),
    path('pending-termination/', views.PendingTermination, name="PendingTermination"),
    path('pending-termination/', views.PendingTermination, name="PendingTermination"),

    path('agents/', views.agents, name="agents"),
]
