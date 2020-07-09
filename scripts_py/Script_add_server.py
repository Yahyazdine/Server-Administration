from netmiko import ConnectHandler
import sqlite3
import sys
import os

def ajout_server( server,host,username,password ):
         serveur=[server]
         VM={'device_type': 'linux','host': host,
            'username': str( username ),'password': str( password )}
         net_connect=ConnectHandler( **VM )
         mac=net_connect.send_command( "ifconfig -a | grep eth | cut -c38-55" )
         osystem=net_connect.send_command( "cat /etc/centos-release" )
         serveur=[str( server )]
         serveur.append( str( mac ) )
         serveur.append( str( osystem ) )
         serveur.append( 'up' )
         serveur.extend( [str( host ),str( username ),str( password )] )
         return serveur
#####Insertion dans la base des données

conn=sqlite3.connect( 'Servers' )
c=conn.cursor()
c.execute( """CREATE TABLE IF NOT EXISTS info_server(
          serveur_name VARCHAR(20),
          server_mac  VARCHAR(30),
          server_os   VARCHAR(30),
	      state   VARCHAR(30),
	      user_ip   VARCHAR(30),
	      username   VARCHAR(30),
	      password   VARCHAR(30))
          """ )


if __name__ == '__main__':
  response=os.popen( f"ping {sys.argv[2]}" ).read()
  if response.count( 'TTL' ) == 4:
      server=ajout_server( sys.argv [1],sys.argv [2],sys.argv [3],sys.argv [4] )
      c.execute( 'INSERT INTO info_server(serveur_name ,server_mac,server_os,state,user_ip,username,password)'
                 ' VALUES(?,?,?,?,?,?,?)',
                 (server [0],server [1],server [2],server [3],server [4],server [5],server [6]) )
  else:
      server=[sys.argv[1],'wait for connection','wait for connection','down',sys.argv[2],sys.argv[3],sys.argv[4]]
      c.execute( 'INSERT INTO info_server(serveur_name ,server_mac,server_os,state,user_ip,username,password)'
                 ' VALUES(?,?,?,?,?,?,?)',
                 (server [0],server [1],server [2],server [3],server [4],server [5],server [6]) )
conn.commit()
conn.close()