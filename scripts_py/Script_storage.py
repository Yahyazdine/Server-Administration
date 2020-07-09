# Execution chaque jour (8h) pour ammener les résultats des Disques Dur, avec l'execution imédiatement en cas d'urgence

from netmiko import ConnectHandler
import sqlite3
import re


def state_DD(server, host, username, password):
    liste = [server]
    VM = {'device_type': 'linux', 'host': host,
          'username': username, 'password': password}
    net_connect = ConnectHandler(**VM)
    output = net_connect.send_command("df -h | grep -E '/dev/sd' | sed 's/\ \ */\ /g' | cut -f1-5 -d ' ' ")
    date=net_connect.send_command("date| sed 's/\ \ */\ /g' | cut -f1-4,6 -d ' ' ")
    output=re.split(r'[\n\s]\s*', output)
    liste.append(date)
    liste.append( output )
    return liste
ser=[]
conn=sqlite3.connect( 'Servers' )
c=conn.cursor()
t=c.execute("SELECT serveur_name,user_ip,username,password,state FROM info_server")
tableau=t.fetchall()
for x in tableau:
 if x[4]=='down':
  ser.append([x[0],'-',['-','-','-','-','-']])
 else:
  ser.append(state_DD(x[0],x[1],x[2],x[3]))

#####Insertion dans la base des données
conn = sqlite3.connect('Servers')
c = conn.cursor()

c.execute("""CREATE TABLE IF NOT EXISTS info_DD(
          servers_name VARCHAR(20),
          DD_name VARCHAR(30),
          size_DD VARCHAR(30),
          used_DD VARCHAR(30),
          avail_DD VARCHAR(30),
          pourcent_use VARCHAR(30),
          date_state VARCHAR(60))
          """)
for x in ser:
    for i in range(0,len(x[2]),5):
     c.execute('INSERT INTO info_DD(servers_name ,DD_name,size_DD,used_DD,avail_DD,pourcent_use,date_state)'
              ' VALUES(?,?,?,?,?,?,?)',
              (x[0], x[2][i],x[2][i+1],x[2][i+2],x[2][i+3],x[2][i+4],x[1]))

conn.commit()
conn.close()