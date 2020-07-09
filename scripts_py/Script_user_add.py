from netmiko import ConnectHandler
import sys
import sqlite3

def user_add(host,username,password ,user_name,password_user ):
    VM={'device_type': 'linux','host': host,
        'username': username,'password': password}
    net_connect=ConnectHandler( **VM )
    output=net_connect.send_command( "sudo useradd -p   "+password_user+" "+user_name )
    if len(output)==0:
        print("User "+sys.argv[2]+ " has been created in "+sys.argv[1])
    else :
        print(output)

#####Insertion dans la base des données
conn=sqlite3.connect( 'Servers' )
c=conn.cursor()
t=c.execute("SELECT serveur_name,user_ip,username,password,state FROM info_server where serveur_name=?",(sys.argv[1],))
tableau=t.fetchall()
for x in tableau:
 if x[4]=='up':
  user_add(x[1],x[2],x[3],sys.argv[2],sys.argv[3])

