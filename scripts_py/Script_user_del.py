from netmiko import ConnectHandler
import sys
import sqlite3

def user_del(host,username,password ,user_name):
    VM={'device_type': 'linux','host': host,
        'username': username,'password': password}
    net_connect=ConnectHandler( **VM )
    output=net_connect.send_command( "sudo userdel -r -f"+" "+user_name )
    if len(output)==0:
        print("User "+sys.argv[2]+ " has been deleted from "+sys.argv[1])
    else :
        print(output)


conn=sqlite3.connect( 'Servers' )
c=conn.cursor()
t=c.execute("SELECT user_ip,username,password,state FROM info_server WHERE serveur_name=?",(sys.argv[1],))
tableau=t.fetchall()
for x in tableau :
 if x[3]=='up':
    user_del(x[0],x[1],x[2],sys.argv[2])