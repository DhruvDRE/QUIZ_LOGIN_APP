#!C:/Users/hp/PycharmProjects/opencvpython/venv/Scripts/python.exe

import socket
s=socket.socket(socket.AF_INET,socket.SOCK_STREAM)
server='localhost'
port=8080
request="GET / HTTP/1.1\r\nHost:" + server + ":" +str(port) +"\r\n\r\n"
s.connect((server,port))
send(request.encode('UTF-8'))

print("Content-type: text/html\n\n")
result="."
while len(result)>0:
    result=s.recv(4096)
    chunk=result.decode('UTF-8')
    print(chunk)
#import cgi
#form=cgi.FieldStorage()
#username=form.getvalue("fname")

#print ("username")
