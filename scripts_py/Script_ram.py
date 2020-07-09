# Execution chaque jour (8h) pour ammener les résultats des Memoires Ram , avec l'execution imédiatement en cas d'urgence
from netmiko import ConnectHandler
import sqlite3


def memory(server,host,username,password):
    liste=[server]
    VM={'device_type': 'linux','host': host,
        'username': username,'password': password}
    net_connect=ConnectHandler( **VM )
    memoryusage=net_connect.send_command( "head -2 /proc/meminfo | sed 's/\ \ */\ /g' |cut -f2 -d ' ' " )
    memoryusage=memoryusage.split('\n')
    date=net_connect.send_command( "date| sed 's/\ \ */\ /g' |cut -f1-4,6 -d ' ' " )
    liste.append (date)
    liste.append( memoryusage )
    return liste

#####Insertion dans la base des données
conn=sqlite3.connect( 'Servers' )
c=conn.cursor()
t=c.execute("SELECT serveur_name,user_ip,username,password,state FROM info_server")
tableau=t.fetchall()
ser=[]
for x in tableau:
 if x[4]=='down':
  ser.append([x[0],'-',['-','-']])
 else:
  ser.append(memory(x[0],x[1],x[2],x[3]))


c.execute( """CREATE TABLE IF NOT EXISTS state_memory(
          servers_name VARCHAR(200),
          date_mem VARCHAR(200),
          memorytotal VARCHAR(200),
          memoryfree VARCHAR(200))
          """ )

for liste in ser:
    c.execute( 'INSERT INTO state_memory(servers_name,date_mem,memorytotal, memoryfree)'
               ' VALUES(?,?,?,?)',
               (liste[0],liste[1],liste[2][0]+'kB',liste[2][1]+'kB'))

conn.commit()
conn.close()