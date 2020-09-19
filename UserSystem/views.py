from django.shortcuts import render,redirect
from django.http import HttpResponse
from django.contrib.auth import  login, authenticate, get_user_model
User = get_user_model()
# Create your views here.

def signup(request):
    if(request.method=='POST'):
        username=request.POST['username']
        email=request.POST['email']
        password=request.POST['password']
        cpassword=request.POST['cpassword']
        phone=request.POST['password']
        #user = User.objects.creater_user(username=username,password=password,email=email,phone=phone)
        #user.save()
        return redirect('dashboard')

    else:
        return render(request, 'usersystem/signup.html')

def login(request):
    if request.method=='POST':
        username = request.POST.get('username')
        password = request.POST['password']
        user = authenticate (username=username,password=password)
        if user is not None:
            auth.login(request,user)
            #message.success(request, 'You are logged in!')
            return redirect('/dashboard')
        else:
            #message.success(request, 'Invalid credentials!')
            return redirect('/login')
    else:
        return render(request, 'usersystem/login.html')

def dashboard(request):
    return render(request,'dashboard/index.html')

def regdInvestors(request):
    return render(request,'dashboard/registered_investors.html')

def regInvestors(request):
    return render(request,'dashboard/register_investors.html')

def PendingTermination(request):
    return render(request,'dashboard/pending_termination.html')

def agents(request):
    return render(request,'dashboard/agents.html')
